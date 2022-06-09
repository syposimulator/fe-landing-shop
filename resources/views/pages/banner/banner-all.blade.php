@extends('layouts.master')

@section('title', 'Banner All')

@section('content-header')
<section class="content-header">
    <h1>Banner <small>All Slide Banner</small></h1>
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
<livewire:banner.banner-all />
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
