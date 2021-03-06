<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'image'];

    // digunakan untuk mendeklarasikan RouteKeyName untuk tiap URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImage()
    {
        return asset('images/'. $this->image);
    }

    public function categories()
    {
       return $this->belongsToMany(Category::class);
    }

    public function getPrice()
    {
         return 'Rp. ' . number_format($this->price, 0, ",", ".");
    }
}
