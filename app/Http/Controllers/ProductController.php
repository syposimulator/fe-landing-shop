<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('pages.product.product-all');
    }

    public function create(){
        return view('pages.product.product-create');
    }

    public function edit(Request $request){
        $product = Product::whereRaw("BINARY `hash`= ?",$request->productHash)->firstOrFail();
        return view('pages.product.product-edit',compact('product'));
    }
}
