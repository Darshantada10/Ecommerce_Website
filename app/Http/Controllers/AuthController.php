<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function Register()
    {
        return view('Auth.Register');
    }

    public function Login()
    {
        return view('Auth.Login');
    }

    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
        // request()->session()->invalidate();

    }
    public function SaveUser(Request $request)
    {        
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);

        // Mail::to($request->email)->queue(new WelcomeMail($request->name));
        // Mail::to($request->email)->send(new WelcomeMail($request->name));

        // $user = new User;

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();


        // DB::table('users')->insert(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password]);

        return redirect('/login');
    }

    public function VerifyUser(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(Auth::user()->role === 'admin')
            {
                return redirect('/admin/dashboard');
            }
            else if(Auth::user()->role === 'user')
            {
                return redirect('/home');
            }
            else if(Auth::user()->role === 'seller')
            {
                return redirect('/seller/dashboard');
            }
            else if(Auth::user()->role === 'delivery')
            {
                return redirect('/delivery/dashboard');
            }
            else
            {
                return redirect('/login');
            }
        }
        else
        {
            return redirect()->back()->with('error','Invalid Email or Password');
        }
    }
}
