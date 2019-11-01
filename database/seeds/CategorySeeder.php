<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([[
          'name' => 'Flagship',
          'slug' => str_slug('flagship'),
          'description' => 'Flagship Phone',
        ],[
          'name' => 'Midrange',
          'slug' => str_slug('midrange'),
          'description' => 'Midrange Phone',
        ],[
          'name' => 'Low End',
          'slug' => str_slug('low end'),
          'description' => 'Low End Phone',
        ],[
          'name' => 'Asus',
          'slug' => str_slug('asus'),
          'description' => 'Asus Phone',
        ],[
          'name' => 'Samsung',
          'slug' => str_slug('samsung'),
          'description' => 'Samsung Phone',
        ],[
          'name' => 'Oppo',
          'slug' => str_slug('oppo'),
          'description' => 'Oppo Phone',
        ],[
          'name' => 'Vivo',
          'slug' => str_slug('vivo'),
          'description' => 'Vivo Phone',
        ],[
          'name' => 'Xiaomi',
          'slug' => str_slug('xiaomi'),
          'description' => 'Xiaomi Phone',
        ],[
          'name' => 'Nokia',
          'slug' => str_slug('nokia'),
          'description' => 'Nokia Phone',
        ],[
          'name' => 'Iphone',
          'slug' => str_slug('iphone'),
          'description' => 'Iphone Phone',
        ],[
          'name' => 'Mito',
          'slug' => str_slug('mito'),
          'description' => 'Mito Phone',
        ]]);
    }
}
