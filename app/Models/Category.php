<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','image','description'];
    
    
    public function brands()
    {
        return $this->hasMany(Brand::class);
        // this category class has many brands class
    }
}
