<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('issues')->insert([
            ['computer_id' => 1, 'reported_by' => 'John Doe', 'reported_date' => now(), 'description' => 'Máy tính không khởi động được', 'urgency' => 'High', 'status' => 'Mới'],
            // Thêm các vấn đề khác
        ]);
    }
}
