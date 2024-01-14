<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // dashboard-admin
            'dashboard-admin-C',
            'dashboard-admin-R',
            'dashboard-admin-U',
            'dashboard-admin-D',
            // dashboard-staff
            'dashboard-staff-C',
            'dashboard-staff-R',
            'dashboard-staff-U',
            'dashboard-staff-D',
            // dashboard-user
            'dashboard-user-C',
            'dashboard-user-R',
            'dashboard-user-U',
            'dashboard-user-D',
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
            // criticism and suggestions
            'criticismNsuggestions-C',
            'criticismNsuggestions-R',
            'criticismNsuggestions-U',
            'criticismNsuggestions-D',
            // history
            'history-C',
            'history-R',
            'history-U',
            'history-D',
            // config website
            'website-C',
            'website-R',
            'website-U',
            'website-D',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
