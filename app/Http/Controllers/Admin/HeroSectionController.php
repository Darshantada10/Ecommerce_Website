<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function Index()
    {
        return view('Admin.HeroSection.Index');

    }
}
