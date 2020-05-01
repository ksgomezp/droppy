@extends('layouts.master')

@section("title", __('shoppingCar.shoppingCar'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('shoppingCar.shoppingCar') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('products.name') }}</th>
                                <th>{{ __('products.description') }}</th>
                                <th>{{ __('products.price') }}</th>
                                <th></th>
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
                                    <form method="POST" action="{{ route('shoppingCar.delete', $product->getId()) }}">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection