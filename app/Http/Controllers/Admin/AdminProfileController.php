<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminProfileController extends Controller
{
    //
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $id = $user->id;
        $profile = User::where('id','=',$id)->first();

        if($profile)
        {
            if($request->password != ""){
                if(!Hash::check($request->current_password, $profile->password))
                {
                    return back()->with('error', 'Current password is not correct');
                }
                $request->validate([
                    'password' => 'required|min:8|confirmed'
                ]);
                $password = $request->password;
                $profile->password = Hash::make($password);
                $profile->save();
            }

            if($request->email != $profile->email)
            {
                $request->validate([
                    'email' => 'required|min:8|unique:users'
                ]);

                $profile->name = $request->name;
                $profile->email = $request->email;
                $profile->save();
            }
        }

        $notification = array(
            'message' => 'Profile setting changed!'
        );
        return redirect()->back()->with($notification);
    }
}
