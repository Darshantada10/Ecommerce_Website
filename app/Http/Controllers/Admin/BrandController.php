<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function Index()
    {
        $brands = Brand::all();
        // dd($brands[0]->category->name);
        return view('Admin.Brand.Index',compact('brands'));
    }
    public function Create()
    {
        $categories = Category::all();
        return view('Admin.Brand.Create',compact('categories'));
    }
    public function Edit($id)
    {
        $data = Brand::findOrFail($id);
        $categories = Category::all();
        return view('Admin.Brand.Edit',compact('data','categories'));
    }
    public function Delete($id)
    {
        $data = Brand::findOrFail($id);

        if($data->logo)
        {
            File::delete(public_path($data->logo));
        }
        
        $data->delete();
        return redirect('/admin/all/brands')->with('success','Brand Deleted Successfully');
    }
    public function Save(Request $request)
    {
        if($request->hasFile('logo'))
        {
            $path = public_path('logo');
            $name = time().uniqid().'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path,$name);
            $logo = 'logo/'.$name;
        }

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id'=>$request->category_id,
            'logo' => $logo ?? null,

        ]);
        return redirect('/admin/all/brands')->with('success','Brand Added Successfully');

    }
    public function Update($id, Request $request)
    {
        $data = Brand::findOrFail($id);
        $logo = $data->logo;

        if($request->hasFile('logo'))
        {
            if($data->logo)
            {
                File::delete(public_path($data->logo));
            }
            $path = public_path('logo');
            $name = time().uniqid().'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path,$name);
            $logo = 'logo/'.$name;
        }

        $data->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id'=>$request->category_id,
            'logo' => $logo,

        ]);

        return redirect('/admin/all/brands')->with('success','Brand Updated Successfully');
    }
}
