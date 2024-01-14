<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'author_id' => 3,
            'title'     => 'Tester',
            'category'  => 'kritik',
            'status'    => 1,
            'desc'      => 'Tester',
        ]);

        Message::create([
            'author_id' => 3,
            'title'     => 'Tester',
            'category'  => 'saran',
            'status'    => 1,
            'desc'      => 'Tester',
        ]);
    }
}
