@extends('layouts.master')

@section('title', __('products.createProduct'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('products.createProduct') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('products.name') }}</label>
                            <input class="form-control" type="text" placeholder="Enter name" name="name"
                                value="{{ old('name') }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('products.description') }}</label>
                            <input class="form-control" type="text" placeholder="Enter description" name="description"
                                value="{{ old('description') }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('products.image') }}</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>{{ __('categories.category') }}</label>
                            <select class="form-control" name="categoryId" value="{{ old('categoryId') }}">
                                @foreach ($data['categories'] as $category)
                                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('products.stock') }}</label>
                            <input class="form-control" type="text" placeholder="Enter stock" name="stock"
                                value="{{ old('stock') }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('products.price') }}</label>
                            <input class="form-control" type="text" placeholder="Enter price" name="price"
                                value="{{ old('price') }}" />
                        </div>

                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.create') }}" />
                        <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection