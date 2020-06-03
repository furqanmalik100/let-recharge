<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;

class HomeController extends Controller
{
    use ServicesAPI;

    public function index()
    {
        $countries = $this->countries();
        return view('index', compact('countries'));
    }

    public function about()
    {
        return view('about');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function contact()
    {
        return view('contact');
    }
}
