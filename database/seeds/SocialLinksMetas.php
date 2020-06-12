<?php

use Illuminate\Database\Seeder;

class SocialLinksMetas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\SocialLinksMeta::create([
            'platform_name' => 'facebook',
            'link' => 'https://www.facebook.com/profile',
        ]);

        App\SocialLinksMeta::create([
            'platform_name' => 'twitter',
            'link' => 'https://www.twitter.com/profile',
        ]);

        App\SocialLinksMeta::create([
            'platform_name' => 'instagram',
            'link' => 'https://www.instagram.com/profile',
        ]);

        App\SocialLinksMeta::create([
            'platform_name' => 'pinterest',
            'link' => 'https://www.pinterest.com/profile',
        ]);

        App\SocialLinksMeta::create([
            'platform_name' => 'youtube',
            'link' => 'https://www.youtube.com/profile',
        ]);
    }
}
