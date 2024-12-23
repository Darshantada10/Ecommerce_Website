<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','slug','logo','description','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // this brand class belongs to category class
    }
    public function products()
    {
        return $this->hasMany(Product::class);
        // this brand class has many products class
    }
}
