<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::all();
        return view('Admin.Category.Index',compact('categories'));
    }

    public function Create()
    {
        return view('Admin.Category.Create');
    }

    public function Edit($id)
    {
        $data = Category::findOrFail($id);
        return view('Admin.Category.Edit',compact('data'));
    }

    public function Delete($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect('/admin/all/categories')->with('success','Category Deleted Successfully');
    }

    public function Save(Request $request)
    {
        if($request->hasFile('image'))
        {
            $path = public_path('categories');
            $name = time().uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($path,$name);
            $image = 'categories/'.$name;
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $image,

        ]);
        return redirect('/admin/all/categories')->with('success','Category Added Successfully');

    }

    public function Update($id, Request $request)
    {
        $data = Category::findOrFail($id);
        $image = $data->image;

        if($request->hasFile('image'))
        {
            if($data->image)
            {
                File::delete(public_path($data->image));
            }
            $path = public_path('categories');
            $name = time().uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($path,$name);
            $image = 'categories/'.$name;
        }

        $data->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $image,

        ]);

        return redirect('/admin/all/categories')->with('success','Category Updated Successfully');
    }
}
