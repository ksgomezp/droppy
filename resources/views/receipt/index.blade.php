@extends('layouts.master')

@section("title", __('receipts.receipt'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('receipts.orders') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                    
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('receipts.receipt') }}</th>
                            <th>{{ __('shoppingCart.totalAmount') }}</th>
                            <th>{{ __('receipts.date') }}</th>
                        </tr>

                    </thead>
                    <tbody>
                    @foreach($data["receipts"] as $receipt)
                        <tr>
                            <td>{{ $receipt->getId() }}</td>
                            <td>{{ $receipt->getTotalAmount() }}</td>
                            <td>{{ $receipt->getCreated() }}</td>
                            <td><a class="btn btn-primary" href="{{ route('receipt.show', $receipt->getId()) }}">{{ __('buttons.reviewOrder') }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection