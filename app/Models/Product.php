<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
       return $this->belongsToMany(Category::class);
    }
}
