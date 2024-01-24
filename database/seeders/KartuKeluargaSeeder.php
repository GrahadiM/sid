<?php

namespace Database\Seeders;

use App\Models\KartuKeluarga;
use Illuminate\Database\Seeder;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KartuKeluarga::create([
            'penduduk_id' => 1,
            'no' => 1234567890,
            'dusun' => 'Dusun 1',
            'desa' => 'Aek Nabara',
            'kec' => 'Simangumban',
            'kab' => 'Tapanuli Utara',
            'prov' => 'Sumatera Utara',
        ]);
    }
}
