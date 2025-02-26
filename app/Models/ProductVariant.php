<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'original_price',
        'sale_price',
        'quantity',
        'attributes',
    ];
    protected $casts = [
        'attributes' => 'array',
        'original_price' => 'decimal:4',
        'sale_price' => 'decimal:4',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
