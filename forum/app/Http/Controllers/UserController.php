<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Auth;
use File;

class UserController extends Controller
{
    const DEFAULT_AVATAR = 'default.png';

    public function editprofile() {
        return view('profile.editprofile', array('user' => Auth::user()));
    }

    public function update_profile(Request $request) {

        //Updating the user's name
        if(($request->has('name')))
        {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->save();
        }

        //Updating the user's profile picture
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '-' . uniqid() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(250)->save( public_path('/images/avatars/' . $filename));

            //Retrieves logged in user form database
            $user = Auth::user();

            //Checks if user has already set a different picture from default
            if ($user->avatar !== self::DEFAULT_AVATAR) {
                $file = public_path('/images/avatars/' . $user->avatar);

                if (File::exists($file)) {
                    //Deleting existing image file
                    unlink($file);
                }
            }

            $user->avatar = $filename;
            $user->save();
        }

        return view('profile.editprofile', array('user' => Auth::user()));
    }
}
