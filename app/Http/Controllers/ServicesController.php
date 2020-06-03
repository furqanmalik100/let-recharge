<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;

class ServicesController extends Controller
{
	use ServicesAPI;
	
    public function orderPage(Request $req)
    {
        $countries = $this->countries();
        $operators = $this->operators($req->country_id, '7');
        $products = $this->products($req->operator_id);

        return view('topup', compact('countries', 'operators', 'products'));
    }

    public function getCountries()
    {
        dd($this->countries());
    }

    public function getServices()
    {
    	dd($this->services('715'));
    }

    public function getOperators(Request $req)
    {
    	$opts = $this->operators($req->country_id, '7');
        return view('ajax.country_operators', compact('opts'));
    }

    public function getProducts(Request $req)
    {
    	$products = $this->products('1928');
        return view('ajax.operator_products', compact('products'));
    }
}