@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <b>{{ __('comments.description') }}:</b> {{ $data["comment"]->getDescription() }}<br />
                    <b>{{ __('comments.date') }}:</b> {{ $data["comment"]->getCreated() }}<br /><br />
                    <form action="{{ route('comment.destroy',['commentId'=> $data["comment"]->getId()]) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" value="Delete" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
