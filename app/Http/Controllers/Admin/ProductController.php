<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->paginate(10);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.product.create',[
          'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required|min:20',
            'price'       => 'required|numeric',
            'category'    => 'required',
        ]);

        $product = Product::create([
            'name'        => ucwords($request->name),
            'slug'        => str_slug($request->name),
            'description' => ucfirst($request->description),
            'price'       => $request->price,
        ]);

        $categories = Category::find($request->category);

        $product->categories()->attach($categories);

        return redirect()->route('product.index')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit',[
            'product'  => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required|min:20',
            'price'       => 'required|numeric',
            'category'    => 'required',
        ]);

        $product->update([
            'name'        => ucwords($request->name),
            'slug'        => str_slug($request->name),
            'description' => ucfirst(strtolower($request->description)),
            'price'       => $request->price,
        ]);

        $product->categories()->sync($request->category);

        return redirect()->route('product.index')->with('info', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('danger', 'Product Deleted');
    }
}
