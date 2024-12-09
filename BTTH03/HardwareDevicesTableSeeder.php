<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hardware_devices')->insert([
            ['device_name' => 'Logitech G502', 'type' => 'Mouse', 'status' => true, 'center_id' => 1],
            // Thêm các thiết bị khác nếu cần
        ]);
    }
}
