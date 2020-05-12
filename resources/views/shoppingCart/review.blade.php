@extends('layouts.app')

@section("title", __('shoppingCart.reviewOrder'))
@section('breadcrumbs', Breadcrumbs::render('reviewOrder'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card-body">
                <div class="card-header font-weight-bold">{{ __('shoppingCart.reviewOrder') }}</div>
                <br />
                <div><strong>{{ __('users.wallet') }}:</strong> {{ $data['wallet'] }}</div>
                <br />
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
                        @if ($data["addressesStr"])
                        <input class="form-control" type="hidden" name="data" value="{{ $data['json'] }}" />
                        @else

                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ __('messages.notAddress') }}</strong>
                        </div>

                        <input class="form-control" type="hidden" name="data" value="{{ $data['json'] }}" disabled />
                        @endif



                    </div>
                    @if ($data["addressesStr"])
                    <input class="btn btn-warning" type="submit" value="{{ __('buttons.buy') }}" />
                    @else
                    <input class="btn btn-warning" type="submit" value="{{ __('buttons.buy') }}" disabled />

                    @endif
                    <a class="btn btn-secondary" href="{{ route('shoppingCart.index') }}">{{ __('buttons.back') }}</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection