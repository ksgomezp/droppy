@extends('layouts.master')

@section("title", $data['product']->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $data['product']->getName() }}</div>
                <div class="card-body">
                    <b>{{ __('products.description') }}: </b> {{ $data['product']->getDescription() }}<br />
                    <b>{{ __('categories.category') }}: </b> {{ $data['category']->getName() }}<br />
                    <b>{{ __('products.stock') }}: </b> {{ $data['product']->getStock() }} <br />
                    <b>{{ __('products.price') }}: </b> {{ $data['product']->getPrice() }} <br />
                    <br />
                    <form method="POST" action="{{ route('product.destroy', $data['product']->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-primary"
                            href="{{ route('comment.create', $data['product']->getId()) }}">{{ __('comments.createComment') }}</a>
                        <a class="btn btn-info"
                            href="{{ route('comment.index', $data['product']->getId()) }}">{{ __('comments.viewComments') }}</a>
                        <a class="btn btn-success"
                            href="{{ route('product.edit', $data['product']->getId()) }}">{{ __('buttons.edit') }}</a>
                        <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>
                        <br /><br />
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection