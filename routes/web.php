<?php

use Illuminate\Http\Request;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Frontend\\HomeController@index')->name('homepage');

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
