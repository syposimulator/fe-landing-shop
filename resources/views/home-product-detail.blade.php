@extends('layouts.app')

@section('title','')

@section('content')
<div class="container-fluid">
    @if($productDetail)
    <div class="row pt-3">
        <div class="col-md-5">
            <div id="productSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($productDetail['media'] as $k => $v)
                    <button type="button" data-bs-target="#productSlider" data-bs-slide-to="{{$k}}" class="{{($k == 0 ? 'active':'') }}" aria-current="{{($k == 0 ? 'true':'false') }}" aria-label="{{$productDetail['name']}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($productDetail['media'] as $k => $v)
                        <div class="carousel-item {{($k == 0 ? 'active':'') }}" data-bs-interval="10000">
                            <a href="{{asset('storage/'.$v)}}" data-fancybox="gallery" data-caption="{{$productDetail['name']}}">
                                <img src="{{env('STORAGE_BASE')}}{{$v}}" class="d-block w-100" alt="{{$productDetail['name']}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-7">
            <div class="widget">
                <div class="widget_1">
                    <h1 class="">{{$productDetail['name']}}</h1>
                </div>
            </div>
            <div class="">
            <div class="d-flex justify-content-between">
                <span class="text-muted">Harga</span>
                <h4 class="fw-bold">Rp. {{number_format($productDetail['harga_diskon'])}}</h4>
            </div>
            <span class="d-flex justify-content-end">
                <del class="text-muted">Rp. {{number_format($productDetail['harga_asli'])}}</del>
            </span>
            <div class="mb-3 mt-2">
                {!!$productDetail['desc']!!}
            </div>
            <h6>Pesan Melalui:</h6>
            <div class="text-center mt-2">
                @foreach ($productDetail['link_checkout'] as $v)
                    <a href="{{$v['link']}}" target="_blank">
                        <button type="button" class="btn btn-outline-danger me-3 mb-3">{{$v['name']}}</button>
                    </a>
                @endforeach
                
                {{-- <a href="">
                <button type="button" class="btn btn-outline-warning me-3 mb-3">LAZADA</button>
                </a>
                <a href="">
                <button type="button" class="btn btn-outline-success me-3 mb-3">WHATSAPP</button>
                </a> --}}
            </div>
            </div>
        </div>
    </div>
    @endif
        
    <div class="row">
        <div class="col-md-8">
            <div class="widget mt-3">
                <div class="widget_1">
                    <h1 class="">Informasi Produk</h1>
                </div>
            </div>
            <article class="content-article" itemprop="articleBody">
            @if($productDetail)
            {!!$productDetail['content']!!}
            @endif
            </article>
        </div>
        <div class="col-md-4">
            <div class="widget mt-3">
                <div class="widget_1">
                    <h1 class="">Produk Lainnya</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop