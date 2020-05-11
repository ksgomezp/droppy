@extends('layouts.app')

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
                    <br/>
                    <form method="POST" action="{{ route('user.destroy', $data['user']->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-primary" href="{{ route('address.create', $data['user']->getId()) }}">{{ __('addresses.createAddress') }}</a>
                        <a class="btn btn-info" href="{{ route('address.index', $data['user']->getId()) }}">{{ __('addresses.viewAddress') }}</a>
                        @if(Auth::user())
                        @if(Auth::user()->admin())
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                        @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
