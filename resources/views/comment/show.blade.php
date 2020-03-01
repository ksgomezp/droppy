@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <b>Comment description:</b> {{ $data["comment"]->getDescription() }}<br />
                    <b>Comment date:</b> {{ $data["comment"]->getCreated() }}<br /><br />
                    @csrf
                    <a class ="btn btn-danger"  href="{{ route('comment.delete',['id'=> $data["comment"]->getId()]) }}">  Delete comment  </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
