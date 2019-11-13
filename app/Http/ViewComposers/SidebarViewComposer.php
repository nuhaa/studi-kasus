<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

/**
 * SidebarViewComposer
 */
class SidebarViewComposer
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        // $categories = $this->category->get();
        // $categories->load('products');
        $view->with('categories', $this->category->with('products')->get());
    }
}
