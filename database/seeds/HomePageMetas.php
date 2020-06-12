<?php

use Illuminate\Database\Seeder;

class HomePageMetas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\HomeSectionMeta::create([
            'name' => 'site_favicon',
            'value' => 'favicon.ico',
        ]);

        App\HomeSectionMeta::create([
            'name' => 'site_logo',
            'value' => 'logo.png',
        ]);

        App\HomeSectionMeta::create([
            'name' => 'hero_image',
            'value' => 'banner.jpg',
        ]);

        App\HomeSectionMeta::create([
            'name' => 'hero_image_heading',
            'value' => '<h4>Online Recharge Your Mobile.</h4>',
        ]);

        App\HomeSectionMeta::create([
            'name' => 'footer_text',
            'value' => '<p>Advice me cousin an spring of needed. Tell use paid law ever yet new. Meant to learn of vexed if style allow he there.</p>',
        ]);

        App\HomeSectionMeta::create([
            'name' => 'footer_copyright_text',
            'value' => '<p>2020 All Rights Reserved. - Created by <a href="index.html">DevioTech</a></p>',
        ]);
    }
}
