@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Редактировать продукт</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" style="width: 500px;margin: 30px auto;">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="brand">Производитель</label>
            <select type="text" name="brand_id" id="brand" class="form-select">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if($brand->id == $product->brand->id) selected @endif>{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Название продукта</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="qty">Количество</label>
            <input type="number" name="qty" id="qty" class="form-control" value="{{ old('qty', $product->qty) }}" min="0">
            @error('qty')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2 me-2">Сохранить изменения</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">Отмена</a>
    </form>

@endsection

