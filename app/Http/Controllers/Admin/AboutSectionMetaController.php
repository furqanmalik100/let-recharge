<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutSectionMeta;
use Auth;
use Illuminate\Support\Facades\File;

class AboutSectionMetaController extends Controller
{
    //
    public function index()
    {
        $about_section_meta = AboutSectionMeta::all();
        return view('admin.cms.about_section_meta', compact('about_section_meta'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'about_page_image'=>'mimes:jpeg,bmp,png,gif,jpg',
            'about_page_heading'=>'required',
            'about_page_text'=>'required',
        ]);

        if ($request->hasFile('about_page_image')) {
            $existing = AboutSectionMeta::where('name', '=', 'about_page_image')->first();
            if ($existing) {
                $ex_about_image_path = public_path()."/cms/about/".$existing->value;
                if(File::exists($ex_about_image_path))
                {
                    File::delete($ex_about_image_path);
                }
                $about_image = $request->file('about_page_image');
                $name = $about_image->getClientOriginalName();

                $about_image->move(public_path('/cms/about'),$name);

                AboutSectionMeta::where('name', '=', 'about_page_image')->update([
                    'value' => $name
                ]);
            }
        }

        AboutSectionMeta::where('name', '=', 'about_page_heading')->update([
            'value' => $request->about_page_heading
        ]);

        AboutSectionMeta::where('name', '=', 'about_page_text')->update([
            'value' => $request->about_page_text
        ]);


        $notification = array(
            'message' => 'Content Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }
}
