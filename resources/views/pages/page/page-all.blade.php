@extends('layouts.master')

@section('title', 'Page All')

@section('content-header')
<section class="content-header">
    <h1>Page <small>All Page</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('page.create')}}" class="btn btn-info btn-sm" style="color: white">
                Create
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:page.page-all />
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
