<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('pages.blog.blog-all');
    }

    public function create(){
        return view('pages.blog.blog-create');
    }

    public function edit(Request $request){
        $blog = Blog::whereRaw("BINARY `hash`= ?",$request->blogHash)->firstOrFail();
        return view('pages.blog.blog-edit',compact('blog'));
    }
}
