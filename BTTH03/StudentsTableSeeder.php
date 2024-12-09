<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            ['first_name' => 'Nguyễn', 'last_name' => 'Văn A', 'date_of_birth' => '2015-01-01', 'parent_phone' => '0123456789', 'class_id' => 1],
            ['first_name' => 'Trần', 'last_name' => 'Thị B', 'date_of_birth' => '2014-02-02', 'parent_phone' => '0987654321', 'class_id' => 2],
            // Thêm các học sinh khác
        ]);
    }
}
