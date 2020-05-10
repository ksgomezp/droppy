@extends('layouts.app')

@section("title", __('categories.category'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('categories.categories') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($data['categories'] as $category)
                        <li class="list-group-item">{{ $category->getName() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection