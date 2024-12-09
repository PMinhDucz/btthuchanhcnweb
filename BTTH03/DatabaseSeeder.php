<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    



     public function run()
     {
        $this->call(MedicinesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ComputersTableSeeder::class);
        $this->call(IssuesTableSeeder::class);
         
     }
     
}
