@extends('layouts.app')

@section("title", __('posts.api'))

@section('content')
<div class="container">
    <h1>{{ __('posts.publications') }}</h1>
    @foreach ($posts as $post)
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>                
            </div>
        </div>
    @endforeach
</div>
@endsection