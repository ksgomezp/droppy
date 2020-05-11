@extends('layouts.app')

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
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data["addresses"] as $address)
                            <tr>
                                <td>{{ $data["countries"][$loop->index]->getName() }}</td>
                                <td>{{ $data["states"][$loop->index]->getName() }}</td>
                                <td>{{ $data["cities"][$loop->index]->getName() }}</td>
                                <td> {{ $address->getDeliveryAddress() }}</td>
                                <td> {{ $address->getPostalCode() }}</td>
                                <td>
                                    <form method="POST" action="{{ route('address.destroy', [$data['user']->getId(), $address->getId()]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-success" href="{{ route('address.edit', [$data['user']->getId(), $address->getId()]) }}">{{ __('buttons.edit') }}</a>
                                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-light" href="{{ route('admin.users.show', $data['user']->getId()) }}">{{ __('buttons.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection