@extends('layouts.master')

@section('title', 'Blog All')

@section('content-header')
<section class="content-header">
    <h1>Blog <small>All Blog</small></h1>
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
<livewire:blog.blog-all />
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
