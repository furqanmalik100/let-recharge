<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class GeneralSettingsController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first();
        if (empty($settings)) {
            Setting::create([
                'stripe_public_key' => $request->stripe_public_key,
                'stripe_secret_key' => $request->stripe_secret_key,
                'services_api_public_key' => $request->services_api_public_key,
                'services_api_secret_key' => $request->services_api_secret_key,
                'airtime_api_login' => $request->airtime_api_login,
                'airtime_api_token' => $request->airtime_api_token,
            ]);
        }
        else{
            $settings->stripe_public_key = $request->stripe_public_key;
            $settings->stripe_secret_key = $request->stripe_secret_key;
            $settings->services_api_public_key = $request->services_api_public_key;
            $settings->services_api_secret_key = $request->services_api_secret_key;
            $settings->airtime_api_login = $request->airtime_api_login;
            $settings->airtime_api_token = $request->airtime_api_token;
            $settings->save();
        }
        $notification = array(
            'message' => 'Settings Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }
}
