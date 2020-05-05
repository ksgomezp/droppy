@extends('layouts.master')

@section("title", __('comments.createComment'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('comments.createComment') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('comment.store', $data['product']->getId()) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="{{ __('comments.speakYourMind') }}"
                                name="content" value="{{ old('content') }}" />
                            <div class="input-group-append">
                                <span class="form-group-btn">
                                    <input class="btn btn-success" type="submit" value="Send" />
                                </span>
                            </div>
                        </div>
                        <a class="btn btn-light"
                            href="{{ route('product.show', $data['product']->getId()) }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection