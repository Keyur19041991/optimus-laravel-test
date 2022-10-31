<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('view/category/{categoryId}', 'App\Http\Controllers\HomeController@viewCategory')->name('view.category');
