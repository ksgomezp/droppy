@extends('layouts.app')

@section("title", $data['user']->getName())
@section('breadcrumbs', Breadcrumbs::render('user', $data['user']))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $data['user']->getName() }}</div>
                <div class="card-body">
                    <b>{{ __('users.email') }}: </b> {{ $data['user']->getEmail() }}<br />
                    <b>{{ __('users.phone') }}: </b> {{ $data['user']->getPhone() }}<br />
                    <b>{{ __('users.dateOfBirth') }}: </b> {{ $data['user']->getDateOfBirth() }} <br />
                    <b>{{ __('users.wallet') }}: </b> {{ $data['user']->getWallet() }} <br />
                    <br />
                    <form method="POST" action="{{ route('admin.user.destroy', $data['user']->getId()) }}">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="{{ __('buttons.delete') }}" />
                        <a class="btn btn-success" href="{{ route('admin.user.update', $data['user']->getId()) }}">{{ __('buttons.edit') }}</a>
                        <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection