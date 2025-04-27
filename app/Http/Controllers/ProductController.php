<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index($slug,$id)
    {
        // dd($slug,$id);
        $product = Product::where('id',$id)->where('slug',$slug)->firstOrFail();
        // dd($product);
        return view('Product.Index',compact('product'));
    }

    public function AddToCart(Request $request)
    {
        dd($request);
    }
}
