@extends('layouts.app')

@section('content')
<div id="slider_banner" class="carousel carousel-dark slide mt-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($slider as $k => $v)
        <button type="button" data-bs-target="#slider_banner" data-bs-slide-to="{{$k}}" class="{{($k == 1 ? 'active':'')}}"></button>
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
        @foreach($product as $v)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                <a href="/product/{{Str::slug($v->name)}}-{{$v->hash}}" title="{{$v->name}}">
                    @if($v->media)
                    @php $m = $v->media @endphp
                    <img data-src="{{asset('storage/'.end($m))}}" src="{{asset('storage/'.end($m))}}" class="card-img-top lazy" alt="{{$v->name}}">
                    @else
                    <img src="https://via.placeholder.com/854x500" class="card-img-top" alt="{{$v->name}}">
                    @endif
                </a>
                <div class="card-body p-2">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Harga</span>
                        <span class="fw-bold">Rp. {{$v->harga_diskon}}</span>
                    </div>
                    <span class="d-flex justify-content-end">
                        <del class="text-muted">Rp. {{$v->harga_asli}}</del>
                    </span>
                    <a href="/product/{{Str::slug($v->name)}}-{{$v->hash}}" title="{{$v->name}}">
                        <h6 class="text-dark">{{ Str::limit($v->name, 50) }}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $product->links() }}
    </div>
</div>
@stop