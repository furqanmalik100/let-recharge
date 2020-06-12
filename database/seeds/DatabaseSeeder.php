<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserTableSeeder::class);
        $this->call(HomePageMetas::class);
        $this->call(AboutPageMetas::class);
        $this->call(FaqSeeder::class);
        $this->call(ContactPageMetas::class);
        $this->call(SocialLinksMetas::class);
    }
}
