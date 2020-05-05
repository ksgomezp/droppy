@extends('layouts.master')

@section("title", __('receipts.receipt'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('receipts.receipt') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        
                    @foreach($data['receipts'] as $receipt)
                        <a href="{{ route('receipt.show', $receipt->getId()) }}">
                            <li class="list-group-item">{{ $receipt->getId() }}</li>
                        </a>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection