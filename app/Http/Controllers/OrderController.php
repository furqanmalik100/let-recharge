<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;

class OrderController extends Controller
{
    use ServicesAPI;

    public function orderView(Request $req)
    {
    	if(empty($req->type) || !in_array($req->type, ['mobile-topup', 'all-services']))
        {
            $req->type = 'all-services';
        }

        $countries = $this->countries();
        
        if($req->type == 'all-services')
            $services = $this->services($req->country_id);
        else
        	$services = [];

        return view('topup', compact('countries', 'services', 'req'));
    }
}
