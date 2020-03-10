@extends('layouts.master')

@section("title", $data["title"])

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
                        <input class="form-control" type="text" placeholder="Enter country" name="country" value="{{ old('country') }}" />
                    </div>

                    <div class="form-group">
                        <label>{{ __('addresses.state') }}</label>
                        <input class="form-control" type="text" placeholder="Enter state" name="state" value="{{ old('state') }}" />
                    </div>

                    <div class="form-group">
                        <label>{{ __('addresses.city') }}</label>
                        <input class="form-control" type="text" placeholder="Enter city" name="city" value="{{ old('city') }}" />
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
                <a class="btn btn-light" href="{{ route('user.show', $data['user']->getId()) }}">{{ __('buttons.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection