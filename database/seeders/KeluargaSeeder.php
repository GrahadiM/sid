<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use Illuminate\Database\Seeder;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keluarga::create([
            'kk_id'         => 1,
            'penduduk_id'   => 1,
            'hubungan'      => 'Kepala Keluarga',
        ]);
    }
}
