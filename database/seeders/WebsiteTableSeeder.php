<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SettingWebsite::create([
            'logo' => 'logo_default.png',
            // 'footer' => 'logo_default.png',
            'favicon'  => 'favicon_default.png',
            'title_web' => 'Sistem Informasi Desa',
            'name_web'  => 'Sistem Informasi Desa',
            'footer_web'  => 'GIFY TECH',
            'desc_web'  => 'Let&#39;s Connect',
            'version_web'  => '1.0',
            'wa'  => '85767113554',
            'phone'  => '85767113554',
            'mail'  => 'gify.tech@gmail.com',
            'address'  => 'Jakarta Timur, DKI Jakarta, Indonesia',
            'instagram'  => 'https://www.instagram.com/',
            'twitter'  => 'https://twitter.com/',
            'facebook'  => 'https://www.facebook.com/',
            'youtube'  => 'https://www.youtube.com/',
            'working_hours' => 'Mon-Sun: 09.00 AM - 18.00 PM',
            'desc_footer' => '',
        ]);
    }
}
