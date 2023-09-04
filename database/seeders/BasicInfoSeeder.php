<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basicInfo = [['id' => 1, 'name' => 'Jovan\'s cafѐ',
            'description' => 'Welcome to Jovan\'s cafѐ, where the inviting aroma of freshly brewed coffee fills the air. Our expert baristas skillfully craft each cup with passion, using ethically sourced beans from around the world. Come indulge in the perfect coffee experience, complemented by cozy ambiance and delectable treats.',
            'phone' => '070250760',
            'address' => 'Treta Makedonska Brigada 12, br. 999',
            'email' => 'jovan.macedonian@gmail.com',
            'meta_title' => 'Jovan\'s cafѐ',
            'meta_description' => 'Discover a cozy haven at Jovan\'s Café – where aromatic blends meet warm conversations. Indulge in rich coffees, delightful pastries, and a welcoming ambiance.',
            'created_at' => now(),
            'updated_at' => now()
        ]];
        DB::table('basic_infos')->insert($basicInfo);
    }
}
