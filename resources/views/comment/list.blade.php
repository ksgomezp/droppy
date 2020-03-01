@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <div class="row p-5">
                        <div class="col-md-12">
                            <ul id="errors">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Inspect </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data["comments"] as $comment)
                                        <tr>
                                                @if ($loop->index < 2) 
                                                <th>{{ $comment->getId() }}</th>
                                                @else
                                                <td>{{ $comment->getId() }}</td>
                                                @endif
                                                <td> {{ $comment->getDescription() }}</td>
                                                <td> {{ $comment->getCreated() }}</td>
                                                <td>
                                                    <a class="btn btn-succes" href="{{ route('comment.show', ['id' => $comment->getId()]) }}"> View </a>

                                                </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
