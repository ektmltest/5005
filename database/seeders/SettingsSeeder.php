<?php

namespace Database\Seeders;

use App\Models\Settings\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $social_medias = [
            ['key' => 'facebook', 'link' => 'https://facebook.com/ektml'],
            ['key' => 'twitter', 'link' => 'https://www.twitter.com/ektml_sa'],
            ['key' => 'telegram', 'link' => 'https://t.me/ektml_sa'],
            ['key' => 'instagram', 'link' => 'http://instagrm.com/ektml_sa']
        ];
        SocialMedia::insert($social_medias);
    }
}
