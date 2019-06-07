<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/awal', function(){
	return view('admin.index');
})->name('awal');

Route::get('/cek', function(Request $request){
	// return view('admin.index');
	$user = $request->user();
	// dd($user->hasRole('admin'));
	dd($user->hasPermissionTo('add products'));
})->name('cek');
