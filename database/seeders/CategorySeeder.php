<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Coffee', 'description' => 'The best coffee drinks', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Soft Drinks', 'description' => 'Non-alcoholic beverages', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Alcoholic Drkinks', 'description' => 'Beer, wine and spirits', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);


    }
}
