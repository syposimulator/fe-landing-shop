@extends('layouts.master')

@section('title', 'Banner All')

@section('content-header')
<section class="content-header">
    <h1>Create Banner <small>Create New Banner</small></h1>
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
<livewire:banner.banner-create />
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
