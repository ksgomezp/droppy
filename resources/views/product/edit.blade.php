@extends('layouts.master')

@section("title", $data['product']->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ $data['product']->getName() }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $data['product']->getId()) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('products.name') }}</label>
                            <input class="form-control" type="text" name="name"
                                value="{{ $data['product']->getName() }}" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.description') }}</label>
                            <input class="form-control" type="text" name="description"
                                value="{{ $data['product']->getDescription() }}" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('categories.category') }}</label>
                            <select class="form-control" name="categoryId">
                                @foreach ($data['categories'] as $category)
                                <option value="{{ $category->getId() }}" @if ($category->getId() ==
                                    $data['product']->getCategoryId())
                                    selected
                                    @endif>
                                    {{ $category->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.stock') }}</label>
                            <input class="form-control" type="text" name="stock"
                                value="{{ $data['product']->getStock() }}" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('products.price') }}</label>
                            <input class="form-control" type="text" name="price"
                                value="{{ $data['product']->getPrice() }}" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="{{ __('buttons.save') }}" />
                        <a class="btn btn-light" href="{{ route('product.index') }}">{{ __('buttons.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection