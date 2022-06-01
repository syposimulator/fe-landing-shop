@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8">
      <div class="row">
          @if($category['data'])
            @foreach($category['data'] as $v)
            <div class="col-6 col-md-4 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    @if($v['media'])
                        <img src="{{env('STORAGE_BASE').$v['media'][0]}}" class="card-img-top" alt="{{$v['name']}}">
                    @else
                        <img src="https://via.placeholder.com/854x500" class="card-img-top" alt="{{$v['name']}}">
                    @endif
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Harga</span>
                            <span class="fw-bold">Rp. {{$v['harga_diskon']}}</span>
                        </div>
                        <span class="d-flex justify-content-end">
                            <del class="text-muted">Rp. {{$v['harga_asli']}}</del>
                        </span>
                        <a href="">
                            <h6 class="text-dark">{{ Str::limit($v['name'], 50) }}</h6>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
          @endif
      </div>
  </div>
  <div class="col-md-4">
    
  </div>
</div>
@stop