<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        return view('pages.page.page-all');
    }

    public function create(){
        return view('pages.page.page-create');
    }

    public function edit(Request $request){
        $page = Page::whereRaw("BINARY `hash`= ?",$request->pageHash)->firstOrFail();
        return view('pages.page.page-edit',compact('page'));
    }
}
