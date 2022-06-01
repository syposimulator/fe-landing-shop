@extends('layouts.app')

@section('title',$shop['name'].' - '.$shop['domain']['title'])

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
                <h5>{{$v['title']}}</h5>
                <p>{{$v['content']}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="row d-flex justify-content-center mt-4">
    <div class="col-3 col-md-2 col-lg-1 text-center">
        <a href="/product" class="{{(Request::segment(1) == 'product' ? 'text-info':'text-danger')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
            <div class="fw-bold text-muted pt-2">PRODAK</div>
        </a>
    </div>
    <div class="col-3 col-md-2 col-lg-1 text-center">
        <a href="/blog" class="{{(Request::segment(1) == 'blog' ? 'text-info':'text-danger')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg>
        <div class="fw-bold text-muted pt-2">BLOG</div>
        </a>
    </div>
</div>
<div class="hr-shadow"></div>
<div class="mt-3 mb-3">
    <div class="row">
        @foreach($blogs['data'] as $v)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <a href="/blog/{{Str::slug($v['title'])}}-{{$v['hash']}}">
                    @if($v['image'])
                    <img src="{{env('STORAGE_BASE').$v['image']}}" class="card-img-top" alt="{{$v['title']}}">
                    @else
                    <img src="https://via.placeholder.com/854x500" class="card-img-top" alt="{{$v['title']}}">
                    @endif
                </a>
                <div class="card-body p-2">
                    <a href="/blog/{{Str::slug($v['title'])}}-{{$v['hash']}}">
                        <h6 class="text-dark">{{ Str::limit($v['title'], 80) }}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop