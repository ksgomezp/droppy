@extends('layouts.app')

@section("title", __('addresses.editAddress'))
@section('breadcrumbs', Breadcrumbs::render('editAddress', $data['user']))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('addresses.editAddress') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('address.update', [$data['user']->getId(), $data['address']->getId()]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('addresses.country') }}</label>
                            <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state" value="{{ old('city') }}">
                                <option value="">{{ __('addresses.selectCountry') }}</option>
                                @foreach($data['countries'] as $country)
                                <option value="{{ $country->getId() }}" @if ($country->getId() ==
                                    $data['country']->getId())
                                    selected
                                    @endif>{{ $country->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.state') }}</label>
                            <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city" value="{{ old('city') }}">
                                <option value="">{{ __('addresses.selectState') }}</option>
                                @foreach($data['states'] as $state)
                                <option value="{{ $state->getId() }}" @if ($state->getId() ==
                                    $data['state']->getId())
                                    selected
                                    @endif>{{ $state->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.city') }}</label>
                            <select name="cityId" id="cityId" class="form-control input-lg" value="{{ old('cityId') }}">
                                <option value="">{{ __('addresses.selectCity') }}</option>
                                @foreach($data['cities'] as $city)
                                <option value="{{ $city->getId() }}" @if ($city->getId() ==
                                    $data['address']->getCityId())
                                    selected
                                    @endif>{{ $city->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.deliveryAddress') }}</label>
                            <input class="form-control" type="text" placeholder="{{ __('addresses.enterDeliveryAddress') }}" name="deliveryAddress" value="{{ $data['address']->getDeliveryAddress() }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('addresses.postalCode') }}</label>
                            <input class="form-control" type="text" placeholder="{{ __('addresses.enterPostalCode') }}" name="postalCode" value="{{ $data['address']->getPostalCode() }}" />
                        </div>

                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.save') }}" />
                        <a class="btn btn-secondary" href="{{ route('address.index', $data['user']->getId()) }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection