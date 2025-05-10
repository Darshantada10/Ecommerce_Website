<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'selected_size' => 'nullable|string',
    ]);

    $cart = Cart::updateOrCreate(
        [
            'user_id' => auth()->id(), // or null if guest logic later
            'product_id' => $request->product_id,
            'selected_size' => $request->selected_size,
        ],
        [
            'quantity' => \DB::raw('quantity + ' . (int) $request->quantity),
        ]
    );

    return response()->json([
        'status' => 'success',
        'message' => 'Product added to cart',
        'cart_item' => $cart
    ]);
    }
}
