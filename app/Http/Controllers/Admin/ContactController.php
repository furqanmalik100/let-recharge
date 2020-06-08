<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactSectionMeta;
use Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contact_section_meta = ContactSectionMeta::all();
        return view('admin.cms.contact_section_meta', compact('contact_section_meta'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'contact_page_heading'=>'required',
            'contact_page_text'=>'required',
        ]);

        ContactSectionMeta::where('name', '=', 'contact_page_heading')->update([
            'value' => $request->contact_page_heading
        ]);

        ContactSectionMeta::where('name', '=', 'contact_page_text')->update([
            'value' => $request->contact_page_text
        ]);

        $notification = array(
            'message' => 'Content Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }
}
