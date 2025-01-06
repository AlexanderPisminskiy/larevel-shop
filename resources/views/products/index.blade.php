@extends('layouts.app')

@section('content')

{{--    @if(session('success'))--}}
{{--        <div class="alert alert-success" style="width: 30rem; margin: auto">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

<section style="width: 50rem; margin: 1rem auto">
<div class="d-flex">
    <a class="d-flex flex-column justify-content-center align-items-center me-4 text-primary" style="text-decoration: none" href="{{ route('products.create') }}"><i class="fas fa-plus fa-2x"></i> <span>Добавить</span></a>
    <a class="d-flex flex-column justify-content-center align-items-center me-4 text-success" style="text-decoration: none; color: black" href="{{ route('brands.index') }}"><i class="fas fa-industry fa-2x"></i> <span>Производители</span></a>
</div>

    <table class="table" style="margin: 30px auto;">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Производитель</th>
            <th>Цена</th>
            <th>Количество</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->qty }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}"><i class="fas fa-edit me-1"></i></a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button style="padding: 0" type="submit" class="btn btn-link me-1" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">
                        <i class="fas fa-trash-alt text-danger"></i>
                    </button>
                </form>
                <a href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye text-success"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</section>

@endsection
