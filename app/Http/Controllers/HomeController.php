<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ServicesAPI;
use App\HomeSectionMeta;
use App\AboutSectionMeta;
use App\Faq;
use App\ContactSectionMeta;


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
}
