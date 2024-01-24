<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionTableSeeder::class,
            UsersTableSeeder::class,
            WebsiteTableSeeder::class,
            AnnouncementSeeder::class,
            MessageSeeder::class,
            PendudukSeeder::class,
            KartuKeluargaSeeder::class,
            KeluargaSeeder::class,
            LahirSeeder::class,
            MeninggalSeeder::class,
            PendatangSeeder::class,
            PindahSeeder::class,
        ]);
    }
}
