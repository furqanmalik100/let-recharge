<?php

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Faq::create([
            'question' => 'How can i get help by inbound marketing?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'I have questions about the updated trems',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'User Guide: Getting Started',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'Are you plan to open a branch on Dhaka?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'How can i get help by x company?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'What about loan programs?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'How long your contract trems?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);

        App\Faq::create([
            'question' => 'What about after bank advantage?',
            'answer' => 'We are full service Digital Marketing Agency all the tools you need for inbound success. With this module theres no need to go another day.',
            'status' => 1,
        ]);
    }
}
