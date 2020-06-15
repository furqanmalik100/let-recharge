<?php

use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$promo = new App\Promo();	
        $promo->country_id = 832;
        $promo->country = 'Pakistan';
        $promo->operator_id = 1302;
        $promo->operator = 'JAZZ Pakistan';
        $promo->info = '5% off on calls';
        $promo->status = 1;
        $promo->save();
    }
}
