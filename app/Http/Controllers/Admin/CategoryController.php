<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(5);
        // $categories = Category::orderBy('name', 'asc')->paginate(env('PAGINATION_PER_PAGE'));
        // $categories = Category::orderBy('name', 'asc')->paginate(config('olshop.pagination'));
        return view('admin.category.index', [
          'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
          'name' => 'required|min:3',
          'description' => 'required'
        ]);

        /*opsi 1*/
        /*$category = new Category;
        $category->name = ucwords($request->name);
        $category->description = $request->description;
        $category->slug = str_slug($request->name);
        $category->save();*/

        /*opsi 2 untuk method create (Eloquent) harus diberikan protected fillable di model nya*/
        Category::create([
          'name' => ucwords($request->name),
          'description' => ucwords($request->description),
          'slug' => str_slug($request->name), // helper untuk merubah format name jadi slug
        ]);

        return redirect()->route('category.index')->with('success', 'Category Added');
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
    // public function edit($id) // awal
    public function edit(Category $category) // setelah refactoring
    {
        // dd($category);
        // $category = Category::find($id);
        // gunakan findOrFail untuk query yang bisa langsung 404
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
          'name' => 'required|min:3',
          'description' => 'required'
        ]);

        // $category = Category::find($id);
        $category->update([
            'name' => ucwords($request->name),
            'description' => ucwords($request->description),
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('category.index')->with('info', 'Category Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category = Category::find($id);
        $category->delete();

        return back()->with('danger', 'Category Deleted');
    }
}
