@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Подробно</h1>

    <ul>
        <li>Наименование: {{ $product->name }}</li>
        <li>Производитель: {{ $product->brand->name }}</li>
        <li>Цена: {{ $product->price }}</li>
        <li>Количество: {{ $product->qty }}</li>
    </ul>


@endsection

