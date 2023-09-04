<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id' => 1, 'name' => 'Espresso', 'description' => 'the most popular cofee', 'category_id'=> 1, 'price'=>100, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Turkish coffee', 'description' => 'traditional cofee', 'category_id'=> 1, 'price'=>100,'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'OG', 'description' => 'whatever i want', 'category_id'=> 1, 'price'=>100, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('products')->insert($products);

    }
}
