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
}
