<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $sa = Role::create(['name' => 'super-admin']);
        $user = User::where('email', env('PRIVATE_EMAIL'))->firstOrFail();
        if($user) {
            $user->assignRole($sa);
        }
    }
}
