<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'publication_year' => 2008, 'genre' => 'Programming', 'library_id' => 1],
            // Thêm các sách khác nếu cần
        ]);
    }
}
