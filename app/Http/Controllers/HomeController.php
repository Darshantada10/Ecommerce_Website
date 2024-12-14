<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        // $HeroSection = HeroSection::where('status',1)
        $HeroSection = HeroSection::where('status',true)->latest()->take(5)->get();
        // $HeroSection = HeroSection::where('status',true)->orderBy('created_at','DESC')->take(1)->get();
        // dd($HeroSection);
        return view('Home.Index',compact('HeroSection'));
    }
}
