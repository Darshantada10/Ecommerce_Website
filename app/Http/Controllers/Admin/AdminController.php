<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index()
    {
        return view('Admin.Index');
    }

    public function Profile()
    {
        return view('Admin.Profile');
    }

    public function ProfileSave(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' .$user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'password' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        if($request->hasFile('profile_picture'))
        {
            if($user->profile_picture)
            {
                    File::delete(public_path($user->profile_picture));
            }
            $path = public_path('profile');
            $name = time().uniqid().'.'.$request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->move($path,$name);
            $user->profile_picture = 'profile/'.$name;
        }

        $user->save();

        return redirect()->back()->with('success','Profile Updated Successfully');
    }
}
