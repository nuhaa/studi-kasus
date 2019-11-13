<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show(Product $product){
        // $categories = Category::orderBy('name','asc')->get();
        // $product = Product::where('slug', $slug)->first(); //untuk pakai id
        // $categories->load('products');
        return view('frontend.product.show',[
            // 'categories' => $categories,
            'product'   => $product,
        ]);
    }

    public function byCategory(Category $category)
    {
        $products = $category->products()->paginate(config('olshop.front_pagination'));
        // $categories = Category::orderBy('name','asc')->get();
        // $categories->load('products');
        return view('frontend.product.by-category',[
            'products' => $products,
            // 'categories' => $categories,
        ]);
    }
}
