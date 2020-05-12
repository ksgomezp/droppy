@extends('layouts.app')

@section("title", __('users.user'))
@section('breadcrumbs', Breadcrumbs::render('users'))
@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('users.users') }}</div>
                <div class="card-body">
                <a class="btn btn-primary" href="{{ route('admin.user.buyer') }}">{{ __('users.bestBuyer') }}</a>
                <td></td>
                    <ul class="list-group">
                        @foreach($data['users'] as $user)
                        <a href="{{ route('admin.user.show', $user->getId()) }}">
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