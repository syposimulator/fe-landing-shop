@extends('layouts.master')

@section('title', 'Product All')

@section('content-header')
<section class="content-header">
    <h1>Product <small>All Product</small></h1>
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
<livewire:product.product-all />
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
