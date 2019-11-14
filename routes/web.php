<?php

use Illuminate\Http\Request;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Frontend\\HomeController@index')->name('homepage');
Route::get('/product/{product}', 'Frontend\\ProductController@show')->name('frontend.product.show');
Route::get('/product/category/{category}', 'Frontend\\ProductController@byCategory')->name('frontend.product.by.category');
Route::get('/cart/{product}', 'Frontend\\CartController@addItem')->middleware('auth')->name('cart.add.item');
// Route::get('/cart', 'Frontend\\CartController@index')->name('cart.index');
Route::get('/cart', 'Frontend\\CartController@index')->middleware('auth')->name('cart.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', function () {
    return view('admin.login');
});

// Route::get('/awal', function(){
// 	return view('admin.index');
// })->name('awal');

// Route::get('/cek', function(Request $request){
	// return view('admin.index');
	// $user = $request->user();
  // $user->assignRole('admin');
  // $user->removeRole('admin');
  // $user->syncRoles('admin');
	// dd($user->hasRole('admin'));
	// dd($user->hasPermissionTo('add_product'));
	// dd($user->can('delete_users'));
	// $user->updatePermission('add_product','delete_users','delete_product');
// })->name(' cek');

// Route::get('admin', function(){
//   return 'Admin Panel';
// })->middleware('role:admin');
