<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\AirtimeAPI;

class AirtimeController extends Controller
{
    use AirtimeAPI;

    public function index(Request $req)
    {
        $orderData = session('airtime_order_details');

        $selected_country = $req->selected_country;
        $countries = $this->countries();
        $countryName = $this->getCountryName($selected_country);
        $showRecipient = 'active';

        return view('airtime', compact('countries', 'countryName', 'selected_country', 'orderData', 'showRecipient'));
    }

    public function showSummary(Request $req)
    {
        $orderData = session('airtime_order_details');
        
        if(empty($orderData))
            return redirect()->route('home');

        $showSummary = 'active';
        return view('airtime', compact('orderData', 'showSummary'));
    }

    public function showDone(Request $req)
    {
        if(empty($orderData))
            return redirect()->route('home');

        $showDone = 'active';
        return view('airtime', compact('showDone'));
    }

    public function getProducts($recipient)
    {
    	$data = $this->products([
            'action' => 'msisdn_info',
            'destination_msisdn' => $recipient
        ]);
    	return view('ajax.airtime_products', $data);
    }

    public function saveOrderDetails(Request $req)
    {
        session([
            'airtime_order_details' => (object)$req->except('_token')
        ]);

        return redirect()->route('airtime.show-summary');
    }

    public function saveOrderPayment(Request $req)
    {
    	$user = auth()->user();
    	
        $orderData = session('airtime_order_details'); 
        $stripe = Stripe::make(env('STRIPE_SECRET'));
        $charge = $stripe->charges()->create([
            'source' => $req->stripeToken,
            'currency' => $orderData->currency,
            'amount'   => $orderData->amount,
        ]);

        $this->createAirtimeTransaction([
        	'delivered_amount_info' => 1,
            'destination_msisdn' => $orderData->phone_number,
            'msisdn' => auth()->user()->name,
            'product' => $orderData->product_id,
            'action' => 'topup'
        ]);

        $orderData = (array)$orderData;
        $orderData['type'] = 2;
        $orderData['charge_id'] = $charge['id'];
        $orderData['user_id'] = $user->id;
        Transaction::create($orderData);

        return redirect()->route('airtime.show-done');
    }
}
