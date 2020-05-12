@extends('layouts.app')

@section("title", __('addresses.createAddress'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('addresses.createAddress') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('address.store', $data['user']->getId()) }}">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('addresses.country') }}</label>
                            <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state" value="{{ old('city') }}" required>
                                <option value="">{{ __('addresses.selectCountry') }}</option>
                                @foreach($data['countries'] as $country)
                                <option value="{{ $country->getId() }}">{{ $country->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.state') }}</label>
                            <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city" value="{{ old('city') }}" required>
                                <option value="">{{ __('addresses.selectState') }}</option>
                                @foreach($data['states'] as $state)
                                <option value="{{ $state->getId() }}">{{ $state->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.city') }}</label>
                            <select name="cityId" id="cityId" class="form-control input-lg" value="{{ old('cityId') }}" required>
                                <option value="">{{ __('addresses.selectCity') }}</option>
                                @foreach($data['cities'] as $city)
                                <option value="{{ $city->getId() }}">{{ $city->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.deliveryAddress') }}</label>
                            <input class="form-control" type="text" placeholder="Enter deliveryAddress" name="deliveryAddress" value="{{ old('deliveryAddress') }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.postalCode') }}</label>
                            <input class="form-control" type="text" placeholder="Enter postalCode" name="postalCode" value="{{ old('postalCode') }}" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.create') }}" />
                        <a class="btn btn-light" href="{{ route('user.show', $data['user']->getId()) }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection