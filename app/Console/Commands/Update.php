<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

#[Signature('app:update')]
#[Description('Update the application')]
class Update extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Migrating...');
        Artisan::call('migrate --force');
        $this->info('Sync schedule monitor...');
        $this->call('schedule-monitor:sync');

        return Command::SUCCESS;
    }
}
