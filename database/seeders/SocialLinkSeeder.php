<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'name' => 'Facebook',
                'link' => 'https://facebook.com',
                'svg' => 'photos/social/fb.svg',
                'created_at' => now(), 'updated_at' => now()],
            [
                'name' => 'Instagram',
                'link' => 'https://instagram.com',
                'svg' => 'photos/social/instagram.svg',
                'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('social_links')->insert($socialLinks);

    }
}
