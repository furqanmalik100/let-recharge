<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;
use App\Transaction;
use App\Setting;

use Stripe;

class ServicesController extends Controller
{
	use ServicesAPI;

    public function index(Request $req)
    {
        $orderData = session('service_order_details');

        $selected_country = $req->selected_country;
        $countries = $this->countries();

        if(!$this->serviceEnabled($selected_country))
        {
            return redirect('mobile-topup?selected_country='.$selected_country);
        }

        // $services = $this->services($selected_country);
        $countryName = $this->getCountryName($selected_country);
        $showRecipient = 'active';

        return view('services', compact('countries', 'countryName', 'selected_country', 'orderData', 'showRecipient'));
    }

    public function showSummary(Request $req)
    {
        $orderData = session('service_order_details');
        
        if(empty($orderData))
            return redirect()->route('home');

        $showSummary = 'active';
        return view('services', compact('orderData', 'showSummary'));
    }

    public function showDone(Request $req)
    {
        $orderData = session('service_order_details');
        
        if(empty($orderData))
            return redirect()->route('home');

        $showDone = 'active';
        return view('services', compact('showDone'));
    }

    public function countryServices(Request $req)
    {
    	$services = $this->services($req->country_id);
        return view('ajax.country_services', compact('services'));
    }

    public function serviceOperators(Request $req)
    {
    	$opts = $this->operators($req->country_id, $req->service_id);
        return view('ajax.service_operators', compact('opts'));
    }

    public function operatorProducts(Request $req)
    {
    	$products = $this->products($req->operator_id);
        return view('ajax.operator_products', compact('products'));
    }

    public function saveOrderDetails(Request $req)
    {
        session([
            'service_order_details' => (object)$req->except('_token')
        ]);

        return redirect()->route('services.show-summary');
    }

    public function saveOrderPayment(Request $req)
    {
        if (!session('stripe_secret_key')) {
            session([
                'stripe_secret_key' => Setting::pluck('stripe_secret_key')->first(),
            ]);
        }
        $user = auth()->user();
        $orderData = session('service_order_details'); 
        $stripe = Stripe::make(session('stripe_secret_key'));
        $charge = $stripe->charges()->create([
            'source' => $req->stripeToken,
            'currency' => $orderData->currency,
            'amount'   => $orderData->amount,
        ]);
        $external_id = time();
        $this->createFixedValueTransaction([
            'account_number' => $orderData->phone_number,
            'product_id' => $orderData->product_id,
            'external_id' => $external_id,
            'simulation' => 1
        ]);

        $orderData = (array)$orderData;
        $orderData['type'] = 1;
        $orderData['external_id'] = $external_id;
        $orderData['charge_id'] = $charge['id'];
        $orderData['user_id'] = $user->id;
        $orderData['recipient'] = $orderData['phone_number'];
        Transaction::create($orderData);

        return redirect()->route('services.show-done');
    }
}