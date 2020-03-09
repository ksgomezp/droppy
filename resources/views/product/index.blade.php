@extends('layouts.master')

@section("title", __('products.product'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('products.product') }}</div>
                <div class="card-body">
                @foreach($products as $product)
                <a href="{{ route('product.show', $product->getId()) }}">
                    <li>{{ $product->getName() }}</li>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection