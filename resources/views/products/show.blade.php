@extends('layouts.app')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <h1 style="text-align: center">Подробно</h1>

    <ul>
        <li>Наименование: {{ $product->name }}</li>
        <li>Производитель: {{ $product->brand->name }}</li>
        <li>Цена: {{ $product->price }}</li>
        <li>Количество: {{ $product->qty }}</li>
    </ul>

    <div class="d-flex gap-2 flex-wrap">
        @foreach($product->images as $image)
            <div>
                <img src="/{{ $image->image }}" class="d-block" alt="..." style="height: 300px">
            </div>
        @endforeach
    </div>


{{--    <div id="myCarousel" class="carousel slide">--}}
{{--        <div class="carousel-indicators">--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--        </div>--}}
{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item active">--}}
{{--                <img src="/image/Y8HPkAysOoQ.jpg" class="d-block" alt="..." style="height: 300px">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img src="/image/Y8HPkAysOoQ.jpg" class="d-block" alt="..." style="height: 300px">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Предыдущий</span>--}}
{{--        </button>--}}
{{--        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Следующий</span>--}}
{{--        </button>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        const myCarouselElement = document.querySelector('#myCarousel')--}}

{{--        const carousel = new bootstrap.Carousel(myCarouselElement, {--}}
{{--            interval: 2000,--}}
{{--            touch: false--}}
{{--        })--}}
{{--    </script>--}}


@endsection

