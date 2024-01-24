<?php

namespace Database\Seeders;

use App\Models\Meninggal;
use Illuminate\Database\Seeder;

class MeninggalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meninggal::create([
            'penduduk_id' => '5',
            'date' => now(),
            'reason' => 'Sakit',
        ]);
    }
}
