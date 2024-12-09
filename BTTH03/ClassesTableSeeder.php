<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['grade_level' => 'Pre-K', 'room_number' => 'VH7'],
            ['grade_level' => 'Kindergarten', 'room_number' => 'VH8'],
            // Thêm các lớp học khác
        ]);
    }
}
