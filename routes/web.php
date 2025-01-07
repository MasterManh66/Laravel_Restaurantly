<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => ''], function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
});

route::group(['prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    // Route::resource('category', CategoryController::class);
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
});