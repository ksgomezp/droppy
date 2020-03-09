@extends('layouts.master')

@section("title", __('users.user'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('users.users') }}</div>
                <div class="card-body">
                @foreach($users as $user)
                <a href="{{ route('user.show', $user->getId()) }}">
                    <li>{{ $user->getName() }}</li>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
