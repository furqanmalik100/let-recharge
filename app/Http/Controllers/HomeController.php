<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;
use App\HomeSectionMeta;
use App\AboutSectionMeta;
use App\Faq;
use App\Promo;
use App\ContactSectionMeta;


class HomeController extends Controller
{
    use ServicesAPI;

    public function index()
    {
        $countries = $this->countries();
        $hero_image = HomeSectionMeta::where('name','=','hero_image')->first();
        $hero_image_heading = HomeSectionMeta::where('name','=','hero_image_heading')->first();
        $promos = Promo::where('status', 1)->get();
        return view('index', compact('countries','hero_image_heading','hero_image', 'promos'));
    }

    public function about()
    {
        $about_image = AboutSectionMeta::where('name','=','about_page_image')->first();
        $about_heading = AboutSectionMeta::where('name','=','about_page_heading')->first();
        $about_text = AboutSectionMeta::where('name','=','about_page_text')->first();
        return view('about', compact('about_image','about_heading','about_text'));
    }

    public function faqs()
    {
        $faqs = Faq::where('status','=','1')->get();
        return view('faqs', compact('faqs'));
    }

    public function contact()
    {
        $contact_heading = ContactSectionMeta::where('name','=','contact_page_heading')->first();
        $contact_text = ContactSectionMeta::where('name','=','contact_page_text')->first();
        return view('contact', compact('contact_heading','contact_text'));
    }

    public function redirect()
    {
        if(session('service_order_details'))
            return redirect()->route('services.show-summary');
        else if(session('airtime_order_details'))
            return redirect()->route('airtime.show-summary');
        else
            return redirect()->route('user.dashboard');
    }
}
