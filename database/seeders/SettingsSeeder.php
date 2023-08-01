<?php

namespace Database\Seeders;

use App\Models\Settings\Settings;
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
            ['key' => 'facebook', 'link' => 'https://facebook.com/ektml', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'twitter', 'link' => 'https://www.twitter.com/ektml_sa', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'telegram', 'link' => 'https://t.me/ektml_sa', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'instagram', 'link' => 'http://instagrm.com/ektml_sa', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'whatsapp', 'link' => 'https://api.whatsapp.com/send?phone=+966501611608', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'gmail', 'link' => 'support@ektml.com', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'phone', 'link' => '+447990704483', 'created_at' => now(), 'updated_at' => now()],
        ];
        SocialMedia::insert($social_medias);

        Settings::create([
            'type' => 'offers',
            'key' => 'store_offer',
            'value' => 25,
        ]);
    }
}
