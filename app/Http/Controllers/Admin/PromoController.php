<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AirtimeAPI;
use App\Promo;

class PromoController extends Controller
{
	use AirtimeAPI;

    public function index()
    {
    	$promos = Promo::all();
    	return view('admin.promo.index', compact('promos'));
    }

    public function add()
    {
    	$countries = $this->countries();
    	return view('admin.promo.add', compact('countries'));
    }

    public function save(Request $req, $id = null)
    {
    	$p = is_null($id) ? new Promo() : Promo::find($id);
    	$p->country_id = $req->country_id;
    	$p->operator_id = $req->operator_id;
    	$p->country = $req->country;
    	$p->operator = $req->operator;
    	$p->info = $req->info;
    	$p->save();

    	return back()->with('success', 'Promo saved successfully');
    }

    public function edit($id)
    {
    	$promo = Promo::find($id);

    	$countries = $this->countries();
    	$operators = $this->operators($promo->country_id);
    	return view('admin.promo.edit', compact('promo', 'countries', 'operators'));
    }

    public function changeStatus($id, $status)
    {
    	$promo = Promo::find($id);
    	$promo->status = $status;
    	$promo->save();

    	return back()->with('success', 'Promo status chagend');
    }

    public function delete($id)
    {
    	Promo::find($id)->delete();
    	return back()->with('success', 'Promo deleted successfully');
    }

    public function getOperators(Request $req)
    {
    	$operators = $this->operators($req->country_id);
    	return view('ajax.promo_operators', compact('operators'));
    }
}
