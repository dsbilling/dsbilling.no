<?php

it('defaults the filesystem disk to public', function () {
    expect(config('filesystems.default'))->toBe('public');
});

it('uses the filesystem disk for jetstream profile photos', function () {
    expect(config('jetstream.profile_photo_disk'))->toBe(config('filesystems.default'));
});

it('uses the filesystem disk for livewire temporary uploads', function () {
    expect(config('livewire.temporary_file_upload.disk'))->toBe(config('filesystems.default'));
});

it('uses the filament filesystem disk for uploads by default', function () {
    expect(config('filament.default_filesystem_disk'))->toBe('public');
});

it('configures the s3 disk for laravel cloud object storage', function () {
    expect(config('filesystems.disks.s3'))->toMatchArray([
        'driver' => 's3',
        'visibility' => 'public',
    ])->and(config('filesystems.disks.s3'))->toHaveKeys([
        'key',
        'secret',
        'region',
        'bucket',
        'url',
        'endpoint',
        'use_path_style_endpoint',
    ]);
});

it('resolves s3 when FILESYSTEM_DISK is s3', function () {
    config([
        'filesystems.default' => 's3',
        'jetstream.profile_photo_disk' => 's3',
        'livewire.temporary_file_upload.disk' => 's3',
        'filament.default_filesystem_disk' => 's3',
    ]);

    expect(config('filesystems.default'))->toBe('s3')
        ->and(config('jetstream.profile_photo_disk'))->toBe('s3')
        ->and(config('livewire.temporary_file_upload.disk'))->toBe('s3')
        ->and(config('filament.default_filesystem_disk'))->toBe('s3');
});
