@extends('layouts.app')

@section("title", __('courses.courses'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('courses.courses') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('courses.id') }}</th>
                                    <th>{{ __('courses.name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['data'] as $course)
                                <tr>
                                    <td>{{$course['id']}}</td>
                                    <td>{{$course['name']}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                    <a class="btn btn-secondary" href="{{ route('home.index') }}">{{ __('buttons.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection