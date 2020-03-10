@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('comments.createCommentTag') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('comment.store') }}">
                    @csrf
                    <input type="text" placeholder="Enter description" name="description" value="{{ old('description') }}" />
                    <input class="btn btn-success" type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
