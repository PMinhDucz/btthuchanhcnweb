<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrariesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('libraries')->insert([
            ['name' => 'Thư viện IT Đại học ABC', 'address' => '123 Đường X, Hà Nội', 'contact_number' => '0123456789'],
            // Thêm các thư viện khác nếu cần
        ]);
    }
}
