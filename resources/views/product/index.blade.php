@extends('layouts.app')

@section("title", __('products.product'))
@section('breadcrumbs', Breadcrumbs::render('products'))
@section('content')

<div class="container">
    @include('util.message')
    <form method="GET" action="{{ route('product.search') }}">
        <div class="input-group mb-3">
            <input type="search" class="form-control" name="search" placeholder="{{ __('products.search') }}">
            <div class="input-group-append">
                <span class="form-group-btn">
                    <button type="submit" class="btn btn-primary">{{ __('buttons.search') }}</button>
                </span>
            </div>
        </div>
    </form>

    <div class="input-group mb-3">
        <a class="btn btn-primary" href="{{ route('product.mostComments') }}">{{ __('products.commentedProducts') }}</a>
        &nbsp;
        <a class="btn btn-primary" href="{{ route('product.topProducts') }}">{{ __('products.topProducts') }}</a>
        &nbsp;
        <a class="btn btn-primary" href="{{ route('product.topCategory') }}">{{ __('products.topCategory') }}</a>
        &nbsp;
        <a class="btn btn-primary" href="{{ route('product.orderByPrice') }}">{{ __('products.orderByPrice') }}</a>
        &nbsp;
        <a class="btn btn-primary" href="{{ route('product.orderByStock') }}">{{ __('products.orderByStock') }}</a>
    </div>

    <div class="row">
        @foreach($data['products'] as $product)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" src="{{ URL::asset('storage/' . $product->getImage()) }}" alt="{{ $product->getImage() }}" height="380" width="540">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $product->getName() }}</h5>
                        <p class="card-text">{{ $product->getDescription() }}</p>
                        <a href="{{ route('product.show', $product->getId()) }}" class="btn btn-primary">{{ __('products.moreInfo') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection