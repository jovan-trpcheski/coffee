<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(BasicInfoSeeder::class);

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'jovan.macedonian@gmail.com',
             'password' => bcrypt('jovan123')

         ]);

         //comment for production
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SocialLinkSeeder::class);

    }
}
