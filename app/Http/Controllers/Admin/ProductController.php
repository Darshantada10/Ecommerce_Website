<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::all();
        return view('Admin.Product.Index',compact('products'));
    }

    public function Create()
    {

        /*
            two scenarios

            1. only show those brands which belong to that category(brand is dependent on category)(this seems valid option after upating the brands table logic)
            2. neither brand nor category is dependent on eachother

        */

        $categories = Category::all();
        $brands = Brand::all();
        // $brands = Brand::where('category_id','2')->get();
        // $brands = Brand::where('category_id','=','1')->get();
        // $brands = Brand::where('price','>=','100')->get();
        // dd($brands);
        return view('Admin.Product.Create',compact('categories','brands'));
    }
}
