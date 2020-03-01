@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <a class="navbar-brand" href="{{ route('comment.create') }}">  Create comment  </a>
                  <a class="navbar-brand" href="{{ route('comment.list') }}">  List comments  </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
