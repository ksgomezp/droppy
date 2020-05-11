@extends('layouts.app')

@section('title', __('categories.createCategory'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('categories.createCategory') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('categories.name') }}</label>
                            <input class="form-control" type="text" placeholder="{{ __('categories.enterName') }}"
                                name="name" value="{{ old('name') }}" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.create') }}" />
                        <a class="btn btn-light" href="{{ route('category.index') }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection