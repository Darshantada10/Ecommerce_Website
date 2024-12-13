<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    public function Index()
    {        
        $herosections = HeroSection::all();
        return view('Admin.HeroSection.Index',compact('herosections'));
    }

    public function Create()
    {
        return view('Admin.HeroSection.Create');
    }
    public function Edit($id)
    {
        $data = HeroSection::findOrFail($id);
        return view('Admin.HeroSection.Edit',compact('data'));
    }
    public function Delete($id)
    {
        $data = HeroSection::findOrFail($id);
        $data->delete();
        return redirect('/admin/all/hero-sections')->with('success','Hero Section Deleted Successfully');

    }
    public function Update($id, Request $request)
    {
        $data = HeroSection::findOrFail($id);
        $image = $data->image;

        if($request->hasFile('image'))
        {
            if($data->image)
            {
                    File::delete(public_path($data->image));
            }
            $path = public_path('herosection');
            $name = time().uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($path,$name);
            $image = 'herosection/'.$name;
        }
        // $update = HeroSection::findOrFail($id);

        $data->update([
            'heading' => $request->heading,
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status ? true : false,
            'image' => $image,        
        ]);
        return redirect('/admin/all/hero-sections')->with('success','Hero Section Updated Successfully');


    }
    public function Save(Request $request)
    {
        if($request->hasFile('image'))
        {
            $path = public_path('herosection');
            $name = time().uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($path,$name);
            $image = 'herosection/'.$name;
        }

        HeroSection::create([
            'heading' => $request->heading,
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status ? true : false,
            'image' => $image,

        ]);
        return redirect('/admin/all/hero-sections')->with('success','Hero Section Added Successfully');

    }
}
