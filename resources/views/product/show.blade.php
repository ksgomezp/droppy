@extends('layouts.master')

@section("title", $product->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $product->getName() }}</div>
                <div class="card-body">
                    <b>{{ __('products.description') }}: </b> {{ $product->getDescription() }}<br />
                    <b>{{ __('products.category') }}: </b> {{ $product->getCategory() }}<br />
                    <b>{{ __('products.stock') }}: </b> {{ $product->getStock() }} <br />
                    <b>{{ __('products.price') }}: </b> {{ $product->getPrice() }} <br />
                    <form method="POST" action="{{ route('product.destroy', $product->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success" href="{{ route('product.edit', $product->getId()) }}">{{ __('buttons.edit') }}</a>
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />


                        <a class="btn btn-primary" href="{{ route('comment.create', ['productId' => $product->getId()])}}">{{ __('comments.createComment') }}</a>
                        <a class="btn btn-info" href="{{ route('comment.list', ['productId' => $product->getId()])}}">{{ __('comments.viewComments') }}</a>

                        <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection