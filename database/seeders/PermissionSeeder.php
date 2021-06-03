<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

        // Create permissions
        Permission::firstOrCreate(['name' => 'timeline']);
        Permission::firstOrCreate(['name' => 'cv']);
        
        // Create role and assign permission
        $role = Role::crfirstOrCreateeate(['name' => 'headhunter']);
        $role->givePermissionTo('timeline');
        $role->givePermissionTo('cv');

        // Super Admin
        $sa = Role::firstOrCreate(['name' => 'super-admin']);
        $sa->givePermissionTo(Permission::all());

        // Add role to private email
        $user = User::where('email', env('PRIVATE_EMAIL'))->firstOrFail();
        if($user) {
            $user->assignRole($sa);
        }
    }
}
