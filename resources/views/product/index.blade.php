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
                    @if($loop->iteration < 3)
                        <li class="font-weight-bold">{{ $product->getName() }}</li>
                    @else
                        <li>{{ $product->getName() }}</li>
                    @endif
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection