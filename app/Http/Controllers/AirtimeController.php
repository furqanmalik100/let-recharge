<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\AirtimeAPI;
use App\Traits\TwilioAPI;
use App\Transaction;
use App\Setting;
use Stripe;

class AirtimeController extends Controller
{
    use AirtimeAPI;
    use TwilioAPI;

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
        $orderData = session('airtime_order_details');
        
        if(empty($orderData))
            return redirect()->route('home');

        $showDone = 'active';
        return view('airtime', compact('showDone'));
    }

    public function getProducts(Request $req)
    {
    	$data = $this->products([
            'action' => 'msisdn_info',
            'destination_msisdn' => $req->recipient
        ]);
        // dd($data);
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
        if (!session('stripe_secret_key')) {
            session([
                'stripe_secret_key' => Setting::pluck('stripe_secret_key')->first(),
            ]);
        }
    	$user = auth()->user();
        $orderData = session('airtime_order_details'); 
        $stripe = Stripe::make(session('stripe_secret_key'));
        
        $charge = $stripe->charges()->create([
            'source' => $req->stripeToken,
            'currency' => $orderData->currency,
            'amount'   => $orderData->amount,
        ]);
    	

        $res = $this->createAirtimeTransaction([
        	'delivered_amount_info' => 1,
            'destination_msisdn' => $orderData->phone_number,
            'msisdn' => auth()->user()->name,
            'product' => $orderData->product_id,
            'action' => 'topup'
        ]);
        // dd($res);

        $orderData = (array)$orderData;
        $orderData['type'] = 2;
        $orderData['charge_id'] = $charge['id'];
        $orderData['recipient'] = $orderData['phone_number'];
        $orderData['user_id'] = $user->id;
        Transaction::create($orderData);
        $this->sendMessage('Successfully Purchased!', $orderData['phone_number']);
        return redirect()->route('airtime.show-done');
    }
}
