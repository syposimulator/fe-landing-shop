@extends('layouts.master')

@section('title', 'Banner Edit')

@section('content-header')
<section class="content-header">
    <h1>Edit Banner <small>{{$banner->title}}</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('banner.create')}}" class="btn btn-info btn-sm" style="color: white">
                Create
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:banner.banner-edit :banner="$banner" />
@stop

@section('css_pre')
<link rel="stylesheet" href="/assets/plugins/iCheck/all.css">
@stop

@section('css')
@stop

@section('js_pre')
@stop

@section('js')
<script src="/assets/plugins/iCheck/icheck.min.js"></script>
@stack('scripts')
@stop
