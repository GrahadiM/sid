<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penduduk::create([
            'nik' => '321602160601005',
            'name' => 'Swandi Tambunan',
            'bop' => 'Jakarta',
            'bod' => '2000-06-13',
            'gender' => 'LK',
            'village' => 'Marakash',
            'hamlet' => 'Dusun 1',
            'religion' => 'Kristen',
            'kawin' => 'Belum Kawin',
            'job' => 'Pelajar/Mahasiswa',
            'status' => 'Ada',
        ]);

        Penduduk::create([
            'nik' => '1202075501900001',
            'name' => 'Ganti Harianja',
            'bop' => 'Jakarta',
            'bod' => '2000-06-13',
            'gender' => 'PR',
            'village' => 'Aek Nabara',
            'hamlet' => 'Dusun 3 Ujung G',
            'religion' => 'Kristen',
            'kawin' => 'Belum Kawin',
            'job' => 'Pelajar/Mahasiswa',
            'status' => 'Ada',
        ]);

        Penduduk::create([
            'nik' => '2171120107150003',
            'name' => 'Zaky Ramdani Siliton',
            'bop' => 'Jakarta',
            'bod' => '2000-06-13',
            'gender' => 'LK',
            'village' => 'Aek Nabara',
            'hamlet' => 'Dusun 3 Ujung G',
            'religion' => 'Kristen',
            'kawin' => 'Belum Kawin',
            'job' => 'Pelajar/Mahasiswa',
            'status' => 'Ada',
        ]);

        Penduduk::create([
            'nik' => '156153457575345343',
            'name' => 'Alfian Silitonga',
            'bop' => 'Jakarta',
            'bod' => '2000-06-13',
            'gender' => 'LK',
            'village' => 'Aek Nabara',
            'hamlet' => 'Dusun 3 Ujung G',
            'religion' => 'Kristen',
            'kawin' => 'Belum Kawin',
            'job' => 'Pelajar/Mahasiswa',
            'status' => 'Ada',
        ]);

        Penduduk::create([
            'nik' => '156153457575345343',
            'name' => 'Kristina Ritonga',
            'bop' => 'Jakarta',
            'bod' => '2000-06-13',
            'gender' => 'LK',
            'village' => 'Aek Nabara',
            'hamlet' => '2 Aek Marambong',
            'religion' => 'Kristen',
            'kawin' => 'Belum Kawin',
            'job' => 'Pelajar/Mahasiswa',
            'status' => 'Ada',
        ]);
    }
}
