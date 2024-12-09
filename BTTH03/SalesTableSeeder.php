<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            ['medicine_id' => 1, 'quantity' => 2, 'sale_date' => now(), 'customer_phone' => '0123456789'],
            ['medicine_id' => 2, 'quantity' => 1, 'sale_date' => now(), 'customer_phone' => '0987654321'],
            // Thêm các giao dịch bán hàng khác
        ]);
    }
}
