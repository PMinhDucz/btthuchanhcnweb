<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 20; $i++){
            DB::table('computers')->insert([
                'id' => $i + 1,  
                'computer_name' => $faker->word() . '-' .rand(1, 100),
                'model' => $faker->company . ' ' . $faker->word, 
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11', 'Ubuntu 20.04']), 
                'processor' => $faker->randomElement(['Intel Core i5-11499', 'AMD Ryzen 7', 'Intel Core i7-10700']), 
                'memory' => $faker->numberBetween(4, 64), 
                'available' => $faker->boolean, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }   
    }
}
