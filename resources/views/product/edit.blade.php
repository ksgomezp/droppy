@extends('layouts.master')

@section("title", $product->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $product->getName() }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->getId()) }}" >
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('products.name') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ $product->getName() }}"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.description') }}</label>
                            <input class="form-control" type="text" name="description" value="{{ $product->getDescription() }}"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.category') }}</label>
                            <input class="form-control" type="text" name="category" value="{{ $product->getCategory() }}" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.stock') }}</label>
                        <input class="form-control" type="text" name="stock" value="{{ $product->getStock() }}" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.price') }}</label>
                            <input class="form-control" type="text" name="price" value="{{ $product->getPrice() }}" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.save') }}" />
                        <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection