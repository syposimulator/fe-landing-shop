@extends('layouts.master')

@section('title', 'Blog Edit')

@section('content-header')
<section class="content-header">
    <h1>Edit Blog <small>{{$blog->title}}</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('blog.create')}}" class="btn btn-info btn-sm" style="color: white">
                Create
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:blog.blog-edit :blog="$blog" />
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