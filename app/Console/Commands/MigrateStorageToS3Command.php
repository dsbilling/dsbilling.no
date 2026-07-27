<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Throwable;

class MigrateStorageToS3Command extends Command
{
    protected $signature = 'storage:migrate-to-s3
                            {--source=public : The source disk to copy from}
                            {--destination=s3 : The destination disk to copy to}
                            {--force : Overwrite files that already exist on the destination disk}
                            {--dry-run : List files that would be copied without writing to the destination}';

    protected $description = 'Copy files from the local public disk to S3 (Laravel Cloud Object Storage), preserving keys';

    public function handle(): int
    {
        $sourceDiskName = (string) $this->option('source');
        $destinationDiskName = (string) $this->option('destination');
        $force = (bool) $this->option('force');
        $dryRun = (bool) $this->option('dry-run');

        $source = Storage::disk($sourceDiskName);
        $destination = Storage::disk($destinationDiskName);

        $files = $source->allFiles();

        if ($files === []) {
            $this->info('No files found on the source disk.');

            return self::SUCCESS;
        }

        if ($dryRun) {
            $this->info('Dry run: no files will be written.');
        }

        $copied = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($files as $path) {
            $result = $this->migrateFile($source, $destination, $path, $force, $dryRun);

            match ($result) {
                'copied' => $copied++,
                'skipped' => $skipped++,
                'failed' => $failed++,
            };
        }

        $this->newLine();
        $this->info(($dryRun ? 'Would copy' : 'Copied').": {$copied}");
        $this->info("Skipped: {$skipped}");
        $this->info("Failed: {$failed}");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    private function migrateFile(
        Filesystem $source,
        Filesystem $destination,
        string $path,
        bool $force,
        bool $dryRun,
    ): string {
        if ($destination->exists($path) && ! $force) {
            $this->line("Skipped (exists): {$path}");

            return 'skipped';
        }

        if ($dryRun) {
            $this->line("Would copy: {$path}");

            return 'copied';
        }

        try {
            $destination->put($path, $source->get($path), [
                'visibility' => 'public',
            ]);
        } catch (Throwable $exception) {
            $this->error("Failed: {$path} ({$exception->getMessage()})");

            return 'failed';
        }

        $this->line("Copied: {$path}");

        return 'copied';
    }
}
