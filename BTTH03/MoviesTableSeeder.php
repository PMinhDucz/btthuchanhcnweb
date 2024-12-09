<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            ['title' => 'Avengers: Endgame', 'director' => 'Anthony và Joe Russo', 'release_date' => '2019-04-26', 'duration' => 181, 'cinema_id' => 1],
            // Thêm các phim khác nếu cần
        ]);
    }
}
