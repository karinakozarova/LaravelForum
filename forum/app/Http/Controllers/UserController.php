<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
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

        if($request->has('current_password') && $request->input('current_password') != "")
        {
            $request->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) {
                    if (!\Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }],
            ]);

            if($request->has('new_password') && $request->input('new_password') != "")
            {
                $request->validate([
                    'new_password' => 'required',
                    'confirmation_password' => 'required|same:new_password',
                ]);

                $user = Auth::user();
                $user->password = Hash::make($request['confirmation_password']);
                $user->save();
            }
        }

        //Updating the user's name
        if($request->has('name'))
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
