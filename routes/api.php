<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/clear-cache/{key?}', function(Request $request) {
    if($request->key){
        Cache::pull($request->key);
    }else{
        Artisan::call('cache:clear');
    }
    return response()->json(true);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
