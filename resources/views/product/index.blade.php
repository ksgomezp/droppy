@extends('layouts.app')

@section("title", __('products.product'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('products.products') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('product.search') }}">
                        <div class="input-group mb-3">
                          <input type="search" class="form-control" name="search" placeholder="Search">
                          <div class="input-group-append">
                            <span class="form-group-btn">
                                <button type="submit" class="btn btn-primary">{{ __('buttons.search') }}</button>
                            </span>
                          </div>
                        </div>
                    </form>
                    <ul class="list-group">
                        @foreach($data['products'] as $product)
                        <a href="{{ route('product.show', $product->getId()) }}">
                            <li class="list-group-item">{{ $product->getName() }}</li>
                        </a>
                        @endforeach
                    </ul>
                    <a class="btn btn-primary" href="{{ route('product.mostComments') }}">{{ __('products.commentedProducts') }}</a>
                    <a class="btn btn-primary" href="{{ route('product.topProducts') }}">{{ __('products.topProducts') }}</a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection