<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => env('PRIVATE_EMAIL'),
            'password' => Hash::make('12345678'),
        ])->markEmailAsVerified();
    }
}
