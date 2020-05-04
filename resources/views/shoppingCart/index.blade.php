@extends('layouts.master')

@section("title", __('shoppingCar.shoppingCar'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('shoppingCart.shoppingCart') }}</div>
                <div class="card-body">
                    <form id="buy" method="GET" action="{{ route('item.index') }}">
                        @csrf
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('products.name') }}</th>
                                    <th>{{ __('products.description') }}</th>
                                    <th>{{ __('products.price') }}</th>
                                    <th>{{ __('items.total') }}</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if($data["products"])
                                @foreach($data["products"] as $product)
                                <tr>
                                    <td>{{ $product->getName() }}</td>
                                    <td>{{ $product->getDescription() }}</td>
                                    <td>{{ $product->getPrice() }}</td>
                                    <td>
                                        <input type="number" name="{{ $loop->index }}" min="1" max="{{ $product->getStock() }}" form="buy" />
                                    </td>
                    </form>

                    <td>
                        <form id="delete" method="POST" action="{{ route('shoppingCart.destroy', $product->getId()) }}">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" form="delete" />
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                    </table>
                    <input class="btn btn-warning" type="submit" value="{{ __('buttons.buy') }}" form="buy" />
                    <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection