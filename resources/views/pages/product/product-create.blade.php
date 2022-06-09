@extends('layouts.master')

@section('title', 'Product All')

@section('content-header')
<section class="content-header">
    <h1>Create Product <small>Create New Product</small></h1>
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
<livewire:product.product-create />
@stop

@section('css_pre')
<link rel="stylesheet" href="/assets/plugins/iCheck/all.css">
@stop

@section('css')
<script src="/assets/plugins/tinymce/tinymce.min.js"></script>
@stop

@section('js_pre')
@stop

@section('js')
<script src="/assets/plugins/iCheck/icheck.min.js"></script>
@stack('scripts')
@stop