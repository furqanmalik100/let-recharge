<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class UserController extends Controller
{
    public function index()
    {
    	$user = auth()->user();
    	$transactions = Transaction::where('user_id', $user->id)->get();
    	$services = $transactions->where('type', 1);
    	$airtime = $transactions->where('type', 12);

    	return view('user.dashboard', compact('user', 'services', 'airtime'));
    }

    public function profile()
    {
    	$countries = session('countries');
    	$user = auth()->user();
    	return view('user.profile', compact('user', 'countries'));
    }

    public function updateEmail(Request $req)
    {
    	$req->validate([
    		'email' => 'required|max:191|unique:users'
    	]);

    	$user = auth()->user();
    	$user->email = $req->email;
    	$user->save();

    	return back()->with('success', 'Email updated successfully');
    }

    public function updatePassword(Request $req)
    {
    	$req->validate([
    		'password' => 'required|min:6|confirmed'
    	]);

    	$user = auth()->user();
    	$user->password = bcrypt($req->password);
    	$user->save();

    	return back()->with('success', 'Password updated successfully');
    }

    public function updatePersonalInfo(Request $req)
    {
    	$req->validate([
    		'name' => 'required|max:191',
    		'phone' => 'max:191',
    		'country' => 'max:191',
    	]);

    	$user = auth()->user();
    	$user->name = $req->name;
    	$user->save();

    	$profile = $user->profile;
    	$profile->phone = $req->phone;
    	$profile->country = $req->country;
    	$profile->country_id = $req->country_id;
    	$profile->save();

    	return back()->with('success', 'Personal information successfully');
    }

    public function repeatService($id)
    {
        $transaction = Transaction::find($id);
        $transaction->phone_number = $transaction->recipient;
        session(['service_order_details' => $transaction]);

        return redirect(route('services').'?selected_country='.$transaction->country_id);
    }

    public function repeatAirtime($id)
    {
        $transaction = Transaction::find($id);
        session(['airtime_order_details' => $transaction]);

        return redirect()->route('airtime');
    }
}
