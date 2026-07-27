<?php

use Illuminate\Support\Facades\Storage;

it('copies files from the public disk to s3 preserving keys', function () {
    Storage::fake('public');
    Storage::fake('s3');

    Storage::disk('public')->put('companies/logo.jpg', 'logo-contents');
    Storage::disk('public')->put('uploads/certificate.pdf', 'pdf-contents');
    Storage::disk('public')->put('profile-photos/avatar.jpg', 'avatar-contents');

    $this->artisan('storage:migrate-to-s3')
        ->expectsOutputToContain('Copied: 3')
        ->expectsOutputToContain('Skipped: 0')
        ->expectsOutputToContain('Failed: 0')
        ->assertSuccessful();

    Storage::disk('s3')->assertExists('companies/logo.jpg');
    Storage::disk('s3')->assertExists('uploads/certificate.pdf');
    Storage::disk('s3')->assertExists('profile-photos/avatar.jpg');

    expect(Storage::disk('s3')->get('companies/logo.jpg'))->toBe('logo-contents')
        ->and(Storage::disk('s3')->get('uploads/certificate.pdf'))->toBe('pdf-contents')
        ->and(Storage::disk('s3')->get('profile-photos/avatar.jpg'))->toBe('avatar-contents');
});

it('skips existing destination files unless force is used', function () {
    Storage::fake('public');
    Storage::fake('s3');

    Storage::disk('public')->put('companies/logo.jpg', 'new-contents');
    Storage::disk('s3')->put('companies/logo.jpg', 'old-contents');

    $this->artisan('storage:migrate-to-s3')
        ->expectsOutputToContain('Copied: 0')
        ->expectsOutputToContain('Skipped: 1')
        ->assertSuccessful();

    expect(Storage::disk('s3')->get('companies/logo.jpg'))->toBe('old-contents');

    $this->artisan('storage:migrate-to-s3', ['--force' => true])
        ->expectsOutputToContain('Copied: 1')
        ->expectsOutputToContain('Skipped: 0')
        ->assertSuccessful();

    expect(Storage::disk('s3')->get('companies/logo.jpg'))->toBe('new-contents');
});

it('reports success when the source disk is empty', function () {
    Storage::fake('public');
    Storage::fake('s3');

    $this->artisan('storage:migrate-to-s3')
        ->expectsOutputToContain('No upload files found on the source disk.')
        ->assertSuccessful();
});

it('ignores dotfiles such as gitignore on the source disk', function () {
    Storage::fake('public');
    Storage::fake('s3');

    Storage::disk('public')->put('.gitignore', '*');
    Storage::disk('public')->put('companies/logo.jpg', 'logo-contents');

    $this->artisan('storage:migrate-to-s3', ['--dry-run' => true])
        ->doesntExpectOutputToContain('Would copy: .gitignore')
        ->expectsOutputToContain('Would copy: companies/logo.jpg')
        ->expectsOutputToContain('Would copy: 1')
        ->assertSuccessful();
});

it('lists files that would be copied during a dry run without writing', function () {
    Storage::fake('public');
    Storage::fake('s3');

    Storage::disk('public')->put('companies/logo.jpg', 'logo-contents');
    Storage::disk('public')->put('uploads/certificate.pdf', 'pdf-contents');
    Storage::disk('s3')->put('uploads/certificate.pdf', 'existing-contents');

    $this->artisan('storage:migrate-to-s3', ['--dry-run' => true])
        ->expectsOutput('Dry run: no files will be written.')
        ->expectsOutputToContain('Would copy: companies/logo.jpg')
        ->expectsOutputToContain('Skipped (exists): uploads/certificate.pdf')
        ->expectsOutputToContain('Would copy: 1')
        ->expectsOutputToContain('Skipped: 1')
        ->expectsOutputToContain('Failed: 0')
        ->assertSuccessful();

    Storage::disk('s3')->assertMissing('companies/logo.jpg');
    expect(Storage::disk('s3')->get('uploads/certificate.pdf'))->toBe('existing-contents');
});
