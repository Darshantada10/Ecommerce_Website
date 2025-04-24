<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        // $HeroSection = HeroSection::where('status',1)
        $HeroSection = HeroSection::where('status',true)->latest()->take(5)->get();
        // $HeroSection = HeroSection::where('status',true)->orderBy('created_at','DESC')->take(1)->get();
        // dd($HeroSection);
        $products = Product::where('status',true)->get();
        // $trending = Product::where('status',true)->where('trending',true)->get();
        // dd($products);
        
        return view('Home.Index',compact('HeroSection','products'));
    }
}
