@extends('layouts.master')

@section('title', 'Page Edit')

@section('content-header')
<section class="content-header">
    <h1>Edit Page <small>{{$page->title}}</small></h1>
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
<livewire:page.page-edit :page="$page" />
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
