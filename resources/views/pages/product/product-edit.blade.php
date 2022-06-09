@extends('layouts.master')

@section('title', 'Product Edit')

@section('content-header')
<section class="content-header">
    <h1>Edit Product <small>{{$product->title}}</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('product.create')}}" class="btn btn-info btn-sm" style="color: white">
                Create
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:product.product-edit :product="$product" />
@stop

@section('css_pre')
@stop

@section('css')
@stop

@section('js_pre')
@stop

@section('js')
@stack('scripts')
@stop
