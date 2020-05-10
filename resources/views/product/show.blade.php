@extends('layouts.app')

@section("title", $data['product']->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <h5 class="card-header font-weight-bold bg-white text-dark">{{ $data['product']->getName() }}</h5>
                <img class="card-img-top" src="{{ URL::asset('storage/' . $data['product']->getImage()) }}"
                    alt="{{ $data['product']->getImage() }}">
                <div class="card-body">
                    <p class="card-text">
                        <strong>{{ __('products.description') }}: </strong>{{ $data['product']->getDescription() }}
                    </p>
                    <p class="card-text"><strong>{{ __('categories.category') }}:
                        </strong>{{ $data['category']->getName() }}
                    </p>
                    <p class="card-text"><strong>{{ __('products.stock') }}: </strong>{{ $data['product']->getStock() }}
                    </p>
                    <p class="card-text"><strong>{{ __('products.price') }}:
                        </strong>{{ $data['product']->getPrice() }}
                    </p>

                    <form method="POST" action="{{ route('shoppingCart.store', $data['product']->getId()) }}">
                        @csrf
                        <a class="btn btn-primary"
                            href="{{ route('comment.create', $data['product']->getId()) }}">{{ __('comments.comment') }}</a>
                        <a class="btn btn-info"
                            href="{{ route('comment.index', $data['product']->getId()) }}">{{ __('comments.viewComments') }}</a>
                        <input class="btn btn-warning" type="submit" value="{{ __('shoppingCart.addToCart') }}" />
                        <a class="btn btn-secondary" href="{{ route('product.index') }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection