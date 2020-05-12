@extends('layouts.app')

@section("title", __('posts.api'))

@section('content')
<div class="container">
    <h1>{{ __('posts.publications') }}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ $posts->title }}</h4>               
            </div>
            <div class="panel-body">
                {{ $posts->body }}
            </div>

        </div>
 
</div>
@endsection