@extends('layouts.app')

@section('content')

{{--    @if(session('success'))--}}
{{--        <div class="alert alert-success" style="width: 30rem; margin: auto">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

<section style="width: 56rem; margin: 1rem auto">
<div class="d-flex">
    <a class="d-flex flex-column justify-content-center align-items-center me-4 text-primary" style="text-decoration: none" href="{{ route('products.create') }}"><i class="fas fa-plus fa-2x"></i> <span>Добавить</span></a>
    <a class="d-flex flex-column justify-content-center align-items-center me-4 text-success" style="text-decoration: none; color: black" href="{{ route('brands.index') }}"><i class="fas fa-industry fa-2x"></i> <span>Производители</span></a>
</div>

    <div class="d-flex gap-2 flex-wrap">
        @foreach($products as $index => $product)
            <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: black">
            <div class="card" style="width: 18rem;">
                <img src="{{ $imageList[$index] }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text" style="height: 92px">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Купить</a>
                </div>
                <div>
                    <a href="{{ route('products.edit', $product->id) }}"><i class="fas fa-edit me-1"></i></a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="padding: 0" type="submit" class="btn btn-link me-1" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </div>
            </div>
            </a>
        @endforeach
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const descriptions = document.querySelectorAll('.card-text');

            descriptions.forEach(function (desc) {
                const fullText = desc.innerHTML; // Получаем полный текст
                console.log(fullText);

                if (fullText.length > 120) {
                    desc.innerHTML = fullText.substring(0, 120) + "..."; // Обрезаем и добавляем многоточие
                }
                if (fullText === "") {
                    desc.innerHTML = "Описание отсутствует";
                }
            });
        });
    </script>

</section>

@endsection
