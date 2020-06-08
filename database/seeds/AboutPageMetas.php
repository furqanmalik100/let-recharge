<?php

use Illuminate\Database\Seeder;

class AboutPageMetas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\AboutSectionMeta::create([
            'name' => 'about_page_image',
            'value' => 'about-1.png',
        ]);

        App\AboutSectionMeta::create([
            'name' => 'about_page_heading',
            'value' => '<h3>About LetRecharge</h3>',
        ]);

        App\AboutSectionMeta::create([
            'name' => 'about_page_text',
            'value' => '
                <p>Received shutters expenses ye he pleasant. Drift as blind above at up. No up simple county stairs do should praise as.</p>
                <p>Now principles discovered off increasing how reasonably middletons men. Add seems out man met plate court sense. His joy she worth truth given. You agreeable breakfast his set perceived immediate. Stimulated man are projecting favourable middletons.</p>
                <p>Pianoforte solicitude so decisively unpleasing conviction is partiality he. Or particular so diminution entreaties oh do. Real he me fond show gave shot plan. Mirth blush linen small hoped way its along. Resolution frequently apartments off all discretion devonshire.</p>
            ',
        ]);
    }
}
