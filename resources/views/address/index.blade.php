@extends('layouts.master')

@section("title", __('addresses.addresses'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $data['user']->getName() }} - {{ __('addresses.addresses') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('addresses.country') }}</th>
                                <th>{{ __('addresses.state') }}</th>
                                <th>{{ __('addresses.city') }}</th>
                                <th>{{ __('addresses.deliveryAddress') }}</th>
                                <th>{{ __('addresses.postalCode') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["addresses"] as $address)
                            <tr>
                                <td>{{ $address->getCountry() }}</td>
                                <td> {{ $address->getState() }}</td>
                                <td> {{ $address->getCity() }}</td>
                                <td> {{ $address->getDeliveryAddress() }}</td>
                                <td> {{ $address->getPostalCode() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-light" href="{{ route('user.show', $data['user']->getId()) }}">{{ __('buttons.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection