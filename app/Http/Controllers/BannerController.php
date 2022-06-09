<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        return view('pages.banner.banner-all');
    }

    public function create(){
        return view('pages.banner.banner-create');
    }

    public function edit(Request $request){
        $banner = Banner::whereRaw("BINARY `hash`= ?",$request->bannerHash)->firstOrFail();
        return view('pages.banner.banner-edit',compact('banner'));
    }
}
