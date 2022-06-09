@extends('layouts.master')

@section('title', 'Blog All')

@section('content-header')
<section class="content-header">
    <h1>Create Blog <small>Create New Blog</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url()->previous()}}" class="btn btn-danger btn-sm" style="color: white">
                Back
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:blog.blog-create />
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