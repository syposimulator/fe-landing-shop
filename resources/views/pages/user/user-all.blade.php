@extends('layouts.master')

@section('title', 'User All')

@section('content-header')
<section class="content-header">
    <h1>User <small>All User</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('user.create')}}" class="btn btn-info btn-sm" style="color: white">
                Create
            </a>
        </li>
    </ol>
</section>
@stop

@section('content')
<livewire:user.user-all />
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
