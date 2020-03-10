@extends('layouts.master')

@section("title", $user->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $user->getName() }}</div>
                <div class="card-body">
                    <b>{{ __('users.email') }}: </b> {{ $user->getEmail() }}<br/>
                    <b>{{ __('users.phone') }}: </b> {{ $user->getPhone() }}<br/>
                    <b>{{ __('users.dateOfBirth') }}: </b> {{ $user->getDateOfBirth() }} <br/>
                    <br/>
                    <form method="POST" action="{{ route('user.destroy', $user->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                        <a class="btn btn-light" href="{{ route('user.index') }}">{{ __('buttons.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
