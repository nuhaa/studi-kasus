<?php

// use Illuminate\Http\Request;

Route::get('login', function () {
    return view('admin.index');
})->name('admin.index');
