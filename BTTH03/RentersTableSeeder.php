<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('renters')->insert([
            ['name' => 'Nguyễn Văn A', 'phone_number' => '0987654321', 'email' => 'nva@gmail.com'],
            // Thêm các người thuê khác nếu cần
        ]);
    }
}
