<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $slider = HomeController::dataSlider();
        $page = HomeController::dataPage();
        $product = HomeController::dataProduct();

        $meta['title'] = 'Kopi Palintang - Coffee Palintang';
        $meta['desc'] = 'Palintang adalah salah satu penghasil kopi di daerah bandung. kopi palintang merupkan kopi yang memiliki cita rasa luar biasa di buat oleh para petani palintang dengan perwatan yang baik';
        $meta['keywords'] = 'kopi, kopi palintang, kopi jawa barat, kopi aroma enak,palintang,coffee, coffee shop,ngopi';
        $meta['url'] = \URL::to('/');
        $meta['image'] = asset('/images/default.jpg');

        return view('welcome',compact('meta','slider','page','product'));
    }

    public function product(Request $request){
        $page = HomeController::dataPage();
        $slider = HomeController::dataSlider();
        $product = HomeController::dataProduct();

        $meta['title'] = 'Produk Kopi Palintang - Product Coffee Palintang';
        $meta['desc'] = 'Produk kopi palintang, berbagai jenis dan kualitas kopi palintang';
        $meta['keywords'] = 'produk kopi,produk kopi palintang,daftar kopi palintang, kopi palintang, kopi jawa barat, kopi aroma enak,palintang,coffee, coffee shop,ngopi';
        $meta['url'] = \URL::to('/product');
        $meta['image'] = asset('/images/default.jpg');

        return view('home-product',compact('meta','page','slider','product'));
    }

    public function blog(Request $request){
        $page = HomeController::dataPage();
        $slider = HomeController::dataSlider();
        $blogs = HomeController::dataBlog();

        $meta['title'] = 'Blog Kopi Palintang - Blog Coffee Palintang';
        $meta['desc'] = 'Informasi seputar kopi palintang, berita kopi palintang berisi seputar semua informasi yang berhubungan dengan kopi palintang';
        $meta['keywords'] = 'berita kopi,produk kopi palintang,daftar kopi palintang, informasi kopi palintang, berita kopi palintang,palintang,coffee, coffee shop,ngopi';
        $meta['url'] = \URL::to('/blog');
        $meta['image'] = asset('/images/default.jpg');

        return view('home-blog',compact('meta','page','slider','blogs'));
    }

    public function blogRead(Request $request){
        $meta = HomeController::meta();
        $page = HomeController::dataPage();

        $hash = explode('-',$request->slugBlog);
        $hash = end($hash);

        $blog = HomeController::dataBlogRead($hash);

        $meta['title'] = $blog['title'].' - Kopi Palingtang';
        $meta['desc'] = $blog['desc'];
        $meta['keywords'] = $blog['keywords'];
        $meta['url'] = \URL::to('/blog/'.\Str::slug($blog['title']).'-'.$blog['hash']);
        $meta['image'] = asset('storage/'.$blog['image']);

        return view('home-blog-read',compact('meta','page','blog'));
    }

    public function productDetail(Request $request){
        $meta = HomeController::meta();
        $page = HomeController::dataPage();
        $hash = explode('-',$request->slugProduct);
        $hash = end($hash);

        $productDetail = HomeController::dataProductDetail($hash);

        $meta['title'] = $productDetail['name'].' - Kopi Palingtang';
        $meta['desc'] = $productDetail['desc'];
        $meta['keywords'] = $productDetail['keywords'];
        $meta['url'] = \URL::to('/product/'.\Str::slug($productDetail['name']).'-'.$productDetail['hash']);
        $image = $productDetail['media'];
        $meta['image'] = asset('storage/'.end($image));

        return view('home-product-detail',compact('meta','page','productDetail'));
    }

    public function pageRead(Request $request){
        $meta = HomeController::meta();
        $page = HomeController::dataPage();

        $hash = explode('-',$request->slugPage);
        $hash = end($hash);
        
        $pageRead = HomeController::dataPageRead($hash);

        $meta['title'] = $pageRead['title'].' - Kopi Palingtang';
        $meta['desc'] = $pageRead['desc'];
        $meta['keywords'] = $pageRead['keywords'];
        $meta['url'] = \URL::to('/page/'.\Str::slug($pageRead['title']).'-'.$pageRead['hash']);
        $meta['image'] = asset('storage/'.$pageRead['image']);
        
        return view('home-page',compact('meta','pageRead','page'));
    }

    public static function dataPageRead($hash = NULL){
        $data = Cache::rememberForever('pageRead-'.$hash, function () use($hash){
            return Page::where('status',true)->whereRaw("BINARY `hash`= ?",$hash)->firstOrFail()->toArray();
        });
        return $data;
    }

    public static function dataBlogRead($hash = NULL){
        $data = Cache::rememberForever('blogRead-'.$hash, function () use($hash){
            return Blog::where('status',true)->whereRaw("BINARY `hash`= ?",$hash)->firstOrFail()->toArray();
        });
        return $data;
    }

    public static function dataBlog(){
        // $data = Cache::rememberForever('blog', function (){
            return Blog::where('status',true)->paginate(8);
        // });
        // return $data;
    }

    public static function dataProduct(){
        // $data = Cache::rememberForever('product', function (){
            return Product::where('status',true)->paginate(8);
        // });

        // return $data;
    }

    public static function dataProductDetail($hash = NULL){
        $data = Cache::rememberForever('productDetail'.$hash, function () use($hash){
            return Product::where('status',true)->whereRaw("BINARY `hash`= ?",$hash)->firstOrFail()->toArray();
        });

        return $data;
    }

    public static function dataSlider(){
        $data = Cache::rememberForever('slider', function (){
            return Banner::where('status',true)->get()->toArray();
        });
        return $data;
    }

    public static function dataPage($hash = NULL){
        $data = Cache::rememberForever('page-'.$hash, function () use($hash){
            return Page::where('status',true)->get()->toArray();
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
