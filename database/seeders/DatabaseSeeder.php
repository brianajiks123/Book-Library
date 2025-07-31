<?php

namespace Database\Seeders;

use App\Models\{
    Book,
    Category
};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category
        Category::factory(5)->create();

        // Book
        Book::factory(100)->create();
    }
}
