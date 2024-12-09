<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('laptops')->insert([
            ['brand' => 'Dell', 'model' => 'Inspiron 15 3000', 'specifications' => 'i5, 8GB RAM, 256GB SSD', 'rental_status' => false, 'renter_id' => null],
            // Thêm các laptop khác nếu cần
        ]);
    }
}
