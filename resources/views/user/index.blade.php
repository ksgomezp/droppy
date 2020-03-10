@extends('layouts.master')

@section("title", __('users.user'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('users.users') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                    @foreach($users as $user)
                    <a href="{{ route('user.show', $user->getId()) }}">
                        <li class="list-group-item">{{ $user->getName() }}</li>
                    </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
