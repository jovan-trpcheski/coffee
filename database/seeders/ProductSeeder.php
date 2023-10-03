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
            ['id' => 1, 'name' => 'Espresso', 'description' => 'the most popular coffee', 'category_id'=> 1, 'price'=>2.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Turkish coffee', 'description' => 'traditional coffee', 'category_id'=> 1, 'price'=>2.30,'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Cappuccino', 'description' => 'espresso with steamed milk and milk foam', 'category_id'=> 1, 'price'=>4.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Latte', 'description' => 'espresso with steamed milk', 'category_id'=> 1, 'price'=>4.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Mocha', 'description' => 'espresso with chocolate and steamed milk', 'category_id'=> 1, 'price'=>5.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Americano', 'description' => 'diluted espresso with hot water', 'category_id'=> 1, 'price'=>3.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Macchiato', 'description' => 'espresso with a dash of steamed milk', 'category_id'=> 1, 'price'=>3.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Iced Coffee', 'description' => 'chilled brewed coffee', 'category_id'=> 1, 'price'=>3.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Flat White', 'description' => 'microfoam-textured milk with a shot of espresso', 'category_id'=> 1, 'price'=>4.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Affogato', 'description' => 'espresso over vanilla ice cream', 'category_id'=> 1, 'price'=>6.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Decaf', 'description' => 'coffee with reduced caffeine', 'category_id'=> 1, 'price'=>2.70, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Cold Brew', 'description' => 'coffee brewed with cold water', 'category_id'=> 1, 'price'=>4.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Espresso Con Panna', 'description' => 'espresso with a dollop of whipped cream', 'category_id'=> 1, 'price'=>3.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Red Eye', 'description' => 'coffee with a shot of espresso', 'category_id'=> 1, 'price'=>3.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Cola', 'description' => 'Classic cola drink', 'category_id'=> 2, 'price'=>2.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Lemonade', 'description' => 'Refreshing lemon-flavored drink', 'category_id'=> 2, 'price'=>2.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Iced Tea', 'description' => 'Chilled tea with lemon', 'category_id'=> 2, 'price'=>2.20,'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Orange Juice', 'description' => 'Freshly squeezed orange juice', 'category_id'=> 2, 'price'=>3.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Ginger Ale', 'description' => 'Spicy ginger-flavored soda', 'category_id'=> 2, 'price'=>2.30, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'Root Beer', 'description' => 'Classic root beer soda', 'category_id'=> 2, 'price'=>2.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'name' => 'Grape Soda', 'description' => 'Sweet grape-flavored soda', 'category_id'=> 2, 'price'=>2.30, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'name' => 'Sparkling Water', 'description' => 'Carbonated water', 'category_id'=> 2, 'price'=>1.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'name' => 'Cream Soda', 'description' => 'Sweet cream-flavored soda', 'category_id'=> 2, 'price'=>2.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'name' => 'Fruit Punch', 'description' => 'Mixed fruit-flavored drink', 'category_id'=> 2, 'price'=>2.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'name' => 'Martini', 'description' => 'Classic gin or vodka cocktail', 'category_id'=> 3, 'price'=>10.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'name' => 'Margarita', 'description' => 'Tequila-based cocktail with lime', 'category_id'=> 3, 'price'=>9.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'name' => 'Old Fashioned', 'description' => 'Bourbon-based cocktail with bitters', 'category_id'=> 3, 'price'=>11.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'name' => 'Cosmopolitan', 'description' => 'Vodka-based cocktail with cranberry juice', 'category_id'=> 3, 'price'=>9.80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'name' => 'Whiskey Sour', 'description' => 'Whiskey-based cocktail with lemon', 'category_id'=> 3, 'price'=>10.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'name' => 'Beer', 'description' => 'Assorted beers', 'category_id'=> 3, 'price'=>6.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'name' => 'Wine', 'description' => 'Red or white wine', 'category_id'=> 3, 'price'=>8.50, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'name' => 'Sangria', 'description' => 'Red wine with fruit juices', 'category_id'=> 3, 'price'=>9.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'name' => 'Cocktail', 'description' => 'Assorted cocktails', 'category_id'=> 3, 'price'=>10.00, 'created_at' => now(), 'updated_at' => now()],
        ];



        DB::table('products')->insert($products);

    }
}
