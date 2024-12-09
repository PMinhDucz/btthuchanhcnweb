<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItCentersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('it_centers')->insert([
            ['name' => 'Trung tâm Tin học ABC', 'location' => '456 Đường Y, TP.HCM', 'contact_email' => 'contact@abc.com'],
            // Thêm các trung tâm tin học khác nếu cần
        ]);
    }
}
