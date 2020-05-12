@extends('layouts.app')

@section("title", $data['receipt']->getId())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
            
                <div class="card-header font-weight-bold">{{ __('receipts.receipt') }}</div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('products.name') }}</th>
                            <th>{{ __('products.price') }}</th>
                            <th>{{ __('items.quantity') }}</th>
                            <th>{{ __('items.subtotal') }}</th>
                        </tr>

                    </thead>
                    <tbody>
                        @if($data["receipt"])
                        @foreach($data["receipt"]->items as $item)
                        <tr>
                            <td>{{ $item->productTemp($item->getProductId())->getName()}}</td>
                            <td>{{ $item->productTemp($item->getProductId())->getPrice() }}</td>
                            <td>{{ $item->getQuantity() }}</td>
                            <td>{{ $item->getSubtotal() }}</td>

                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>{{ __('shoppingCart.totalAmount') }}</b></td>
                            <td>{{$data['totalAmount']}}</td>

                        </tr>
                    </tbody>
                </table>
                <td><b>{{ __('receipts.address') }}</b>{{$data['receipt']->getAddress()}}</td>
                <br></br>
                <a class="btn btn-secondary" href="{{ route('receipt.index') }}">{{ __('buttons.back') }}</a>
                    
            
            </div>
        </div>
    </div>
</div>
@endsection