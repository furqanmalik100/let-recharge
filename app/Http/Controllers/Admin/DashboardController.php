<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	$users = User::whereRole('user')->count();
    	$transactions = Transaction::orderBy('id', 'desc')->get();
        return view('admin.index', compact('users', 'transactions'));
    }

    public function customers()
    {
    	$customers = User::whereRole('user')->with('profile', 'transactions')->get();
    	return view('admin.customer.index', compact('customers'));
    }

    public function transactions($customer_id = null)
    {
    	if(is_null($customer_id))
    	{
    		$transactions = Transaction::where('user_id', $customer_id)->with('user')->get();
    	}
    	else
    	{
    		$transactions = Transaction::with('user')->get();	
    	}

    	return view('admin.transaction.index', compact('transactions'));
    }
}
