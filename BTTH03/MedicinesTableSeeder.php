<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            ['name' => 'Thuốc A', 'brand' => 'Thương hiệu A', 'dosage' => '10mg', 'form' => 'Viên nén', 'price' => 100.00, 'stock' => 50],
            ['name' => 'Thuốc B', 'brand' => 'Thương hiệu B', 'dosage' => '20mg', 'form' => 'Viên nang', 'price' => 200.00, 'stock' => 30],
            // Thêm các thuốc khác
        ]);
    }
}
