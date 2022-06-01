<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index']);
Route::get('/product',[HomeController::class,'product']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/blog/{slugBlog}',[HomeController::class,'blogRead']);
Route::get('/pages/{slugPage}',[HomeController::class,'pages']);
Route::get('/category/{slugCategory}',[HomeController::class,'productCategory']);
Route::get('/product/{slugCategory}/{slugProduct}',[HomeController::class,'productDetail']);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect()->back();
});