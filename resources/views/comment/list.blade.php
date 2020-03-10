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
                                            <th>{{ __('comments.id') }}</th>
                                            <th>{{ __('comments.description') }}</th>
                                            <th>{{ __('comments.date') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data["comments"] as $comment)
                                        <tr>

                                                <td>{{ $comment->getId() }}</td>
                                                <td> {{ $comment->getDescription() }}</td>
                                                <td> {{ $comment->getCreated() }}</td>

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
