@extends('layouts.master')

@section("title", __('shoppingCart.shoppingCart'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card-body">
                <div class="card-header font-weight-bold">{{ __('shoppingCart.shoppingCart') }}</div>


                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('products.name') }}</th>
                            <th>{{ __('products.description') }}</th>
                            <th>{{ __('products.price') }}</th>
                            <th>{{ __('items.quantity') }}</th>
                        </tr>

                    </thead>
                    <tbody>
                        <form id="reviewOrder" method="POST" action="{{ route('shoppingCart.review') }}">
                            @csrf
                            @if($data["products"])
                            @foreach($data["products"] as $product)
                            <tr>
                                <td>{{ $product->getName() }}</td>
                                <td>{{ $product->getDescription() }}</td>
                                <td>{{ $product->getPrice() }}</td>
                                <td>
                                    <input type="number" name="{{ $loop->index }}" value="1" min="1" max="{{ $product->getStock() }}" form="reviewOrder" required />
                                </td>
                        </form>

                        <td>
                            <form id="delete" method="POST" action="{{ route('shoppingCart.destroy', $product->getId()) }}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="{{ __('buttons.remove') }}" form="delete" />
                            </form>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($data["products"])
                <input class="btn btn-warning" type="submit" value="{{ __('buttons.reviewOrder') }}" form="reviewOrder" />
                @else
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ __('shoppingCart.noProducts') }}</strong>
                </div>
                <input class="btn btn-warning" type="submit" value="{{ __('buttons.reviewOrder') }}" form="reviewOrder" disabled />
                @endif
                <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.back') }}</a>
            </div>

        </div>
    </div>
</div>
@endsection