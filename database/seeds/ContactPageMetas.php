<?php

use Illuminate\Database\Seeder;

class ContactPageMetas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\ContactSectionMeta::create([
            'name' => 'contact_page_heading',
            'value' => '<h2>To Any Question Contact Us</h2>',
        ]);

        App\ContactSectionMeta::create([
            'name' => 'contact_page_text',
            'value' => '
                <p>To sure calm much most long me mean. Able rent long in do we. Uncommonly no it announcing melancholy an in. Mirth learn it he given.</p>
            ',
        ]);
    }
}
