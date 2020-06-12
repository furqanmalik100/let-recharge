<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSectionMeta;
use Auth;
use Illuminate\Support\Facades\File;

class HomeSectionMetaController extends Controller
{
    //
    public function index()
    {
        $home_section_meta = HomeSectionMeta::all();
        return view('admin.cms.home_section_meta', compact('home_section_meta'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'site_favicon'=>'mimes:jpeg,bmp,png,gif,jpg',
            'site_logo'=>'mimes:jpeg,bmp,png,gif,jpg',
            'hero_image'=>'mimes:jpeg,bmp,png,gif,jpg',
            'hero_image_heading'=>'required',
            'footer_text'=>'required',
            'footer_copyright_text'=>'required',
        ]);

        if ($request->hasFile('site_favicon')) {
            $existing = HomeSectionMeta::where('name', '=', 'site_favicon')->first();
            if ($existing) {
                $ex_path = public_path()."/cms/home/".$existing->value;
                if(File::exists($ex_path))
                {
                    File::delete($ex_path);
                }
                $image = $request->file('site_favicon');
                $name = $image->getClientOriginalName();

                $image->move(public_path('/cms/home'),$name);

                HomeSectionMeta::where('name', '=', 'site_favicon')->update([
                    'value' => $name
                ]);
            }
        }

        if ($request->hasFile('site_logo')) {
            $existing = HomeSectionMeta::where('name', '=', 'site_logo')->first();
            if ($existing) {
                $ex_path = public_path()."/cms/home/".$existing->value;
                if(File::exists($ex_path))
                {
                    File::delete($ex_path);
                }
                $image = $request->file('site_logo');
                $name = $image->getClientOriginalName();

                $image->move(public_path('/cms/home'),$name);

                HomeSectionMeta::where('name', '=', 'site_logo')->update([
                    'value' => $name
                ]);
            }
        }

        if ($request->hasFile('hero_image')) {
            $existing = HomeSectionMeta::where('name', '=', 'hero_image')->first();
            if ($existing) {
                $ex_path = public_path()."/cms/home/".$existing->value;
                if(File::exists($ex_path))
                {
                    File::delete($ex_path);
                }
                $image = $request->file('hero_image');
                $name = $image->getClientOriginalName();

                $image->move(public_path('/cms/home'),$name);

                HomeSectionMeta::where('name', '=', 'hero_image')->update([
                    'value' => $name
                ]);
            }
        }

        HomeSectionMeta::where('name', '=', 'hero_image_heading')->update([
            'value' => $request->hero_image_heading
        ]);

        HomeSectionMeta::where('name', '=', 'footer_text')->update([
            'value' => $request->footer_text
        ]);

        HomeSectionMeta::where('name', '=', 'footer_copyright_text')->update([
            'value' => $request->footer_copyright_text
        ]);


        $notification = array(
            'message' => 'Content Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }
}
