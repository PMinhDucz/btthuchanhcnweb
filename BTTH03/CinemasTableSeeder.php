<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cinemas')->insert([
            ['name' => 'CGV Vincom', 'location' => 'Vincom Center, Hà Nội', 'total_seats' => 300],
            // Thêm các rạp chiếu khác nếu cần
        ]);
    }
}
