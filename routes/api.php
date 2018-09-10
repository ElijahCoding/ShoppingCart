<?php

use Illuminate\Http\Request;

Route::resource('categories', 'Categories\CategoryController');
Route::resource('products', 'Products\ProductController');
