<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();
        $menu = HomeController::dataMenu();
        $slider = HomeController::dataSlider();
        $product = HomeController::dataProduct();
        return view('welcome',compact('shop','meta','menu','pages','slider','product'));
    }

    public function product(Request $request){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();
        $menu = HomeController::dataMenu();
        $slider = HomeController::dataSlider();
        $product = HomeController::dataProduct();
        return view('home-product',compact('meta','shop','menu','pages','slider','product'));
    }

    public function blog(Request $request){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();
        $menu = HomeController::dataMenu();
        $slider = HomeController::dataSlider();
        $blogs = HomeController::dataBlog();
        return view('home-blog',compact('meta','shop','menu','pages','slider','blogs'));
    }

    public function blogRead(Request $request){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();
        $menu = HomeController::dataMenu();
        
        $hash = explode('-',$request->slugBlog);
        $hash = end($hash);

        $blog = HomeController::dataBlogRead($hash);
        return view('home-blog-read',compact('meta','shop','menu','pages','blog'));
    }

    public function productCategory(Request $request){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();
        $hash = explode('-',$request->slugCategory);
        $hash = end($hash);
        $category = HomeController::dataProductInCategory($hash);
        $menu = HomeController::dataMenu();
        
        return view('home-product-category',compact('meta','shop','category','menu','pages'));
    }

    public function pages(Request $request){
        $meta = HomeController::meta();
        $pages = HomeController::dataPage();
        $shop = HomeController::dataShop();

        $hash = explode('-',$request->slugPage);
        $hash = end($hash);
        
        $pageRead = HomeController::dataPage($hash);

        $menu = HomeController::dataMenu();
        return view('home-page',compact('meta','shop','pageRead','menu','pages'));
    }

    public static function dataBlogRead($hash = NULL){
        $data = Cache::rememberForever('blogRead'.$hash, function () use($hash){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'blogRead/'.$hash)->json();
        });
        return $data;
    }

    public static function dataBlog(){
        $data = Cache::rememberForever('blog', function (){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'blog')->json();
        });
        return $data;
    }

    public static function dataProduct(){
        $data = Cache::rememberForever('product', function (){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'product/latest')->json();
        });

        return $data;
    }

    public static function dataMenu(){
        $data = Cache::rememberForever('category', function (){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'category')->json();
        });
        return $data;
    }

    public static function dataSlider(){
        $data = Cache::rememberForever('slider', function (){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'slider')->json();
        });
        return $data;
    }

    public static function dataShop(){
        $data = Cache::rememberForever('shop', function (){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'shop')->json();
        });
        return $data;
    }

    public static function dataPage($hash = NULL){
        $data = Cache::rememberForever('page'.$hash, function () use($hash){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'page/'.$hash)->json();
        });
        return $data;
    }

    public static function dataProductInCategory($hash = NULL){
        $data = Cache::rememberForever('productInCategory'.$hash, function () use($hash){
            return Http::withToken(env('API_TOKEN'))->get(env('API_BASE').'category/'.$hash)->json();
        });
        return $data;
    }

    public static function meta(){
        $data = ([
            'title' => 'tes',
            'description' => 'tes',
            'keywords' => 'sas',
            'image' => 'sasas.png',
        ]);
        return $data;
    }
}
