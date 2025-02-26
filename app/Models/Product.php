<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // protected $fillable = ['attributes','category_id','brand_id'];
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'original_price',
        'sale_price',
        'image',
        'gallery',
        'status',
        'sku',
        'has_variants',
        'attributes',
    ];
    protected $casts = [
        'gallery' => 'array',
        'attributes' => 'array',
        'status' => 'boolean',
        'has_variants' => 'boolean',
        'original_price' => 'decimal:4',
        'sale_price' => 'decimal:4',
    ];
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
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
