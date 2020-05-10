@extends('layouts.app')

@section("title", __('shoppingCart.reviewOrder'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card-body">
                <div class="card-header font-weight-bold">{{ __('shoppingCart.reviewOrder') }}</div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('products.name') }}</th>
                            <th>{{ __('products.description') }}</th>
                            <th>{{ __('products.price') }}</th>
                            <th>{{ __('items.quantity') }}</th>
                            <th>{{ __('items.subtotal') }}</th>
                        </tr>

                    </thead>
                    <tbody>
                        @if($data["products"])
                        @foreach($data["products"] as $product)
                        <tr>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getDescription() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $data['quantities'][$loop->index] }}</td>
                            <td>{{ $data['subtotals'][$loop->index] }}</td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>{{ __('shoppingCart.totalAmount') }}</b></td>
                            <td>{{ $data['totalAmount'] }}</td>

                        </tr>
                    </tbody>
                </table>
                <form method="POST" action="{{ route('shoppingCart.buy') }}">
                    @csrf
                    <div class="form-group">

                        <label>{{ __('addresses.selectAddress') }}</label>


                        <select name="address" id="address" class="form-control input-lg dynamic" value="{{ old('address') }}" required>
                            @foreach($data['addressesStr'] as $address)
                            <option value="{{ $address }}">{{ $address }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" type="hidden" name="data" value="{{ $data['json'] }}" />


                    </div>
                    
                    <input class="btn btn-warning" type="submit" value="{{ __('buttons.buy') }}" />

                    <a class="btn btn-light" href="{{ route('shoppingCart.index') }}">{{ __('buttons.back') }}</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection