<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['attributes','category_id','brand_id'];
    protected $casts = ['attributes'=>'json'];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // this product class belongs to category class
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
        // this product class belongs to brand class
    }
}
