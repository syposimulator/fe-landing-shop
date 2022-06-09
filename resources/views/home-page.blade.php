@extends('layouts.app')

@section('title','')

@section('content')
<div class="container-fluid">
    <div class="widget">
        <div class="widget_1">
            <h1 class="text-center">{{$pageRead['title']}}</h1>
        </div>
    </div>
    <article class="content-article" itemprop="articleBody">
        {!!$pageRead['content']!!}
    </article>
</div>
@stop