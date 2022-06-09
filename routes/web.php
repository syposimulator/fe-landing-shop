<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::group(['prefix'=>'dapur'], function(){
    Route::controller(BannerController::class)->group(function(){
        Route::get('banner/all', 'index')->name('banner.all');
        Route::get('banner/create', 'create')->name('banner.create');
        Route::get('banner/edit/{bannerHash}', 'edit')->name('banner.edit');
    });

    Route::controller(PageController::class)->group(function(){
        Route::get('page/all', 'index')->name('page.all');
        Route::get('page/create', 'create')->name('page.create');
        Route::get('page/edit/{pageHash}', 'edit')->name('page.edit');
    });

    Route::controller(BlogController::class)->group(function(){
        Route::get('blog/all', 'index')->name('blog.all');
        Route::get('blog/create', 'create')->name('blog.create');
        Route::get('blog/edit/{blogHash}', 'edit')->name('blog.edit');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('product/all', 'index')->name('product.all');
        Route::get('product/create', 'create')->name('product.create');
        Route::get('product/edit/{productHash}', 'edit')->name('product.edit');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('user/all', 'index')->name('user.all');
        Route::get('user/create', 'create')->name('user.create');
        Route::get('user/edit/{userId}', 'edit')->name('user.edit');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/',[HomeController::class,'index']);
Route::get('/product',[HomeController::class,'product']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/blog/{slugBlog}',[HomeController::class,'blogRead']);
Route::get('/page/{slugPage}',[HomeController::class,'pageRead']);
Route::get('/category/{slugCategory}',[HomeController::class,'productCategory']);
Route::get('/product/{slugProduct}',[HomeController::class,'productDetail']);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect()->back();
});