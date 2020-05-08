@extends('layouts.master')

@section("title", $data['user']->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $data['user']->getName() }}</div>
                <div class="card-body">
                    <b>{{ __('users.email') }}: </b> {{ $data['user']->getEmail() }}<br/>
                    <b>{{ __('users.phone') }}: </b> {{ $data['user']->getPhone() }}<br/>
                    <b>{{ __('users.dateOfBirth') }}: </b> {{ $data['user']->getDateOfBirth() }} <br/>
                    <b>{{ __('users.wallet') }}: </b> {{ $data['user']->getWallet() }} <br/>
                    <br/>
                    <form method="POST" action="{{ route('admin.users.destroy', $data['user']->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-primary" href="{{ route('address.create', $data['user']->getId()) }}">{{ __('addresses.createAddress') }}</a>
                        <a class="btn btn-info" href="{{ route('address.index', $data['user']->getId()) }}">{{ __('addresses.viewAddress') }}</a>
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                        <a class="btn btn-light" href="{{ route('admin.users.index') }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
