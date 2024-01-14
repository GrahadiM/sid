<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => 'Admin',
            'phone'             => '85767113554',
            'email'             => 'admin@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionsAdmin = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $admin->assignRole([$roleAdmin->id]);

        $staff = User::create([
            'name'              => 'Staff',
            'phone'             => '85767113554',
            'username'          => 'staff',
            'email'             => 'staff@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $roleStaff = Role::create(['name' => 'staff']);
        $permissionsStaff = [
            // dashboard-staff
            'dashboard-staff-C',
            'dashboard-staff-R',
            'dashboard-staff-U',
            'dashboard-staff-D',
            // announcement
            'announcement-C',
            'announcement-R',
            'announcement-U',
            'announcement-D',
            // message
            'message-C',
            'message-R',
            'message-U',
            'message-D',
            // history
            'history-C',
            'history-R',
            'history-U',
            'history-D',
        ];
        $roleStaff->syncPermissions($permissionsStaff);
        $staff->assignRole([$roleStaff->id]);

        $user = User::create([
            'name'              => 'User',
            'phone'             => '85767113554',
            'username'          => 'user',
            'email'             => 'user@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $roleUser = Role::create(['name' => 'user']);
        $permissionsUser = [
            // dashboard-user
            'dashboard-user-C',
            'dashboard-user-R',
            'dashboard-user-U',
            'dashboard-user-D',
            // message
            'message-C',
            'message-R',
            'message-U',
            'message-D',
            // criticism and suggestions
            'criticismNsuggestions-C',
            'criticismNsuggestions-R',
            'criticismNsuggestions-U',
            'criticismNsuggestions-D',
        ];
        $roleUser->syncPermissions($permissionsUser);
        $user->assignRole([$roleUser->id]);
    }
}
