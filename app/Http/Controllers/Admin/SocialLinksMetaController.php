<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SocialLinksMeta;
use Auth;
use Illuminate\Support\Facades\File;

class SocialLinksMetaController extends Controller
{
    //
    public function index()
    {
        $social_links_meta = SocialLinksMeta::all();
        return view('admin.cms.social_links_meta', compact('social_links_meta'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'facebook'=>'required',
            'instagram'=>'required',
            'pinterest'=>'required',
            'twitter'=>'required',
            'youtube'=>'required',
        ]);

        SocialLinksMeta::where('platform_name', '=', 'facebook')->update([
            'link' => $request->facebook
        ]);

        SocialLinksMeta::where('platform_name', '=', 'instagram')->update([
            'link' => $request->instagram
        ]);

        SocialLinksMeta::where('platform_name', '=', 'pinterest')->update([
            'link' => $request->pinterest
        ]);

        SocialLinksMeta::where('platform_name', '=', 'twitter')->update([
            'link' => $request->twitter
        ]);

        SocialLinksMeta::where('platform_name', '=', 'youtube')->update([
            'link' => $request->youtube
        ]);

        $notification = array(
            'message' => 'Content Updated Successfully!'
        );
        return redirect()->back()->with($notification);
    }
}
