<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Str;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::all();
        return view('Admin.Product.Index',data: compact('products'));
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
        // dd($brands);
        // $brands = Brand::where('category_id','2')->get();
        // $brands = Brand::where('category_id','=','1')->get();
        // $brands = Brand::where('price','>=','100')->get();
        // dd($brands);
        return view('Admin.Product.Create',compact('categories','brands'));
    }

    public function Save(Request $request)  
    {
        // dd($request);
        
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'original_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
            'status' => 'nullable|boolean',
            'quantity' => 'required|integer',
            'attributes' => 'nullable|array',
        ]);


        $data['slug'] = Str::slug($data['name']);

        if($request->hasFile('image'))
        {
            $imagepath = $request->file('image')->store('products','public');
            $data['image'] = $imagepath;
        }

        if($request->hasFile('gallery'))
        {
            $gallerypaths = [];
            foreach($request->file('gallery') as $image)
            {
                $gallerypaths[] = $image->store('products/gallery','public');
            }
            $data['gallery'] = json_encode($gallerypaths);
        }

        $format =[];

        foreach($request->input('attributes',[]) as $attr)
        {
            if(!empty($attr['key']) && !empty($attr['value']))
            {
                $format[$attr['key']] = $attr['value'];
            }
        }
        
        $data['attributes'] = json_encode($format);
        // dd($data);
        
        Product::create($data);

        return redirect()->route('admin.all.products')->with('success','Product Created Successfully');
    }

    public function Edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        // dd($data);
        return view('Admin.Product.Edit', compact('data','categories','brands'));

    }

    public function Update($id,Request $request)
    {
        // dd($id,$request);
        $product = Product::findOrFail($id);
        // dd($product);

        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'original_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'sku' => 'required|string|max:255|unique:products,sku,'. $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
            'status' => 'nullable|boolean',
            'quantity' => 'required|integer',
            'attributes' => 'nullable|array',
        ]);

        $data['slug'] = Str::slug($data['name']);

        if($request->hasFile('image'))
        {
            if($product->image)
            {
                Storage::delete($product->image);
            }
            $imagepath = $request->file('image')->store('products','public');
            $data['image'] = $imagepath;
        }

        if($request->hasFile('gallery'))
        {
            if($product->gallery)
            {
                foreach(json_decode($product->gallery) as $oldimage)
                {
                    Storage::delete($oldimage);
                }
            }

            $gallerypaths = [];
                
            foreach($request->file('gallery') as $image)
            {
                $gallerypaths[] = $image->store('products/gallery','public');
            }

            $data['gallery'] = json_encode($gallerypaths);
        }


        // if($request->hasFile('gallery'))
        // {
        //     $gallerypaths = [];
        //     foreach($request->file('gallery') as $image)
        //     {
        //         $gallerypaths[] = $image->store('products/gallery','public');
        //     }
        //     $data['gallery'] = json_encode($gallerypaths);
        // }

        // $format =[];

        // foreach($request->input('attributes',[]) as $attr)
        // {
        //     if(!empty($attr['key']) && !empty($attr['value']))
        //     {
        //         $format[$attr['key']] = $attr['value'];
        //     }
        // }
        
        // $data['attributes'] = json_encode($format);
        
        $attributes = [];

        foreach ($request->input('attributes',[]) as $attr) 
        {
            if(!empty($attr['key']) && !empty($attr['value']))
            {
                $key = trim($attr['key']);
                $value = trim($attr['value']);

                if(isset($attributes[$key]))
                {
                    if(is_array($attributes[$key]))
                    {
                        $attributes[$key][] = $value;
                    }
                    else
                    {
                        $attributes[$key] = [$attributes[$key],$value];
                    }
                }
                else
                {
                    $attributes[$key] = $value;
                }
            }
        }
        // dd($key,$value);
        
        $data['attributes'] = json_encode($attributes);

        
        // dd($data);
        
        $product->update($data);
        // Product::create($data);

        return redirect()->route('admin.all.products')->with( 'success','Product Updated Successfully');
    }

    public function Delete($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.all.products')->with( 'success','Product Deleted Successfully');

    }

    // public function Save(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'brand_id' => 'required|exists:brands,id',
    //         'original_price' => 'required|numeric',
    //         'sale_price' => 'nullable|numeric',
    //         'sku' => 'nullable|string|max:255|unique:products,sku',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
    //         'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5100',
    //         'status' => 'nullable|boolean',
    //         'has_variants' => 'nullable|boolean',
    //         'attribute_names' => 'nullable|array',
    //         'attribute_values' => 'nullable|array',
    //         'variants' => 'nullable|array',
    //     ]);

    //     DB::beginTransaction();

    //     try
    //     {
    //         $product = new Product();
    //         $product->name = $request->name;
    //         $product->slug = Str::slug($request->name);
    //         $product->description = $request->description;
    //         $product->category_id = $request->category_id;
    //         $product->brand_id = $request->brand_id;
    //         $product->original_price = $request->original_price;
    //         $product->sale_price = $request->sale_price;
    //         $product->sku = $request->sku;
    //         $product->status = $request->status ?? false;
    //         $product->has_variants = $request->has_variants ?? false;


    //         if($request->hasFile('image'))
    //         {
    //             $imagepath = $request->file('image')->store('products','public');
    //             $product->image = $imagepath;
    //         }

    //         if($request->hasFile('gallery'))
    //         {
    //             $gallerypaths = [];
    //             foreach($request->file('gallery') as $image)
    //             {
    //                 $gallerypaths[] = $image->store('products/gallery','public');
    //             }
    //             $product->gallery = json_encode($gallerypaths);
    //         }

    //         if($request->has_variants)
    //         {
    //             $attributes =[];
                
    //             // dd($request->attribute_names,$request->attribute_values);
    //             foreach($request->attribute_names as $index => $name)
    //             {
    //                 $attributes[$name] = $request->attribute_values[$index];
    //             }

    //             $product->attributes = json_encode($attributes);
    //         }
    //         $product->save();
    //         // dd($product,$request);
    //         if($request->has_variants && $request->variants)
    //         {
    //             foreach($request->variants as $data)
    //             {
    //                 $variant = new ProductVariant();
    //                 $variant->product_id = $product->id;
    //                 $variant->sku = $data['sku'];
    //                 $variant->original_price = $data['original_price'];
    //                 $variant->sale_price = $data['sale_price'];
    //                 $variant->quantity = $data['quantity'];
    //                 $variant->attributes = json_encode($data['attributes']);
    //                 $variant->save();
    //             }
    //         }

    //         DB::commit();

    //         return redirect()->route('admin.all.products')->with('success','Product Created Successfully');
    //     }
    //     catch(Exception $e)
    //     {

    //         DB::rollBack();
    //         return back()->withInput()->with('error','An Error Occured While Saving the Product'.$e->getMessage());

    //     }

    // }
}
