@extends('layouts.app')

@section('title','')

@section('content')
<div id="slider_banner" class="carousel carousel-dark slide mt-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($slider as $k => $v)
        <span data-bs-target="#slider_banner" data-bs-slide-to="{{$k}}" class="{{($k == 1 ? 'active':'')}}"></span>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($slider as $k => $v)
        <div class="carousel-item {{($k == 0 ? 'active':'')}}" data-bs-interval="10000">
            <img src="{{env('STORAGE_BASE').$v['image']}}" class="d-block w-100" alt="{{$v['title']}}">
            <div class="carousel-caption d-none d-md-block">
                {{-- <h5>{{$v['title']}}</h5> --}}
                {{-- <p>{{$v['content']}}</p> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="hr-shadow"></div>

<div class="mt-3 mb-4 text-center" style="color: rgb(118, 30, 30)">
    <h2 class="text-uppercase">Order Via Marketplace</h2>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-4 col-lg-2 text-center">
        <a href="/" class="" target="_blank">
            <img class="" style="max-width: 140px" title="Order kopi palintang via lazada" src="/images/lazada.png" />
        </a>
    </div>
    <div class="col-md-4 col-lg-2 text-center">
        <a href="/" class="" target="_blank">
            <img class="" style="max-width: 140px" title="Order kopi palintang via shopee" src="/images/shopee.png" />
        </a>
    </div>
    <div class="col-md-4 col-lg-2 text-center">
        <a href="https://api.whatsapp.com/send?phone=+6285798881901&text=Halo Kopi Palintang" class="" target="_blank">
            <img class="" style="max-width: 140px" title="Order kopi palintang via whatsapp" src="/images/whatsapp.png" />
        </a>
    </div>
</div>

<div class="hr-shadow"></div>
<div class="mt-3 mb-3">
    <div class="row">
        @foreach($blogs as $v)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <a href="/blog/{{Str::slug($v->title)}}-{{$v->hash}}">
                    @if($v->image)
                    <img src="{{asset('storage/'.$v->image)}}" class="card-img-top" alt="{{$v->title}}">
                    @else
                    <img src="https://via.placeholder.com/854x500" class="card-img-top" alt="{{$v->title}}">
                    @endif
                </a>
                <div class="card-body p-2">
                    <a href="/blog/{{Str::slug($v->title)}}-{{$v->hash}}">
                        <h6 class="text-dark">{{ Str::limit($v->title, 80) }}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>
@stop