@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="content-detail">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <div class="title">
                    <h1 class="text-uppercase">{{$blog['title']}}</h1>
                </div>
                <div class="meta text-muted">
                    <div class="date">
                        <time itemprop="datePublished" datetime="30 May 2022">Senin, 30 Mei 2022</time>
                    </div>
                </div>
                <div class="image">
                    <figure class="figure">
                        <img src="{{env('STORAGE_BASE').$blog['image']}}" class="figure-img img-fluid rounded" alt="{{$blog['title']}}">
                        @if(array_key_exists('imageCaption',$blog))
                        <figcaption class="figure-caption">$blog['imageCaption']</figcaption>
                        @endif
                    </figure>
                </div>
                <article class="content-article" itemprop="articleBody">
                   {!!$blog['content']!!}
                </article>
            </div>
        </div>
        <div class="col-md-4">
            {{-- <div class="adv">
                <img src="https://via.placeholder.com/854x500" class="rounded img-fluid" alt="...">
            </div> --}}
            <div class="widget">
                <div class="widget_1">
                    <h3>Prodak Terlaris</h3>
                </div>
                <div class="">
                </div>
            </div>
            <div class="widget">
                <div class="widget_1">
                    <h3>Blog Terbaru</h3>
                </div>
                <div class="">
                </div>
            </div>
        </div>
    </div>
</div>
@stop