@extends('layouts.app')

@section('css_link')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')
@section('content')
<header class="header">
    <h1 class="title">
        GameApp
    </h1>
</header>
<section class="carousel">
    <div class="carousel-controls">
        <button class="carousel-prev">
            <img src="{{ asset('images/btn-prev.svg') }}" alt="Previous">
        </button>
        <button class="carousel-next">
            <img src="{{ asset('images/btn-next.svg') }}" alt="Next">
        </button>
    </div>
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
            <img src="{{ asset('images/games/' . $slider->image) }}" alt="Logo de un juego" class="carousel-item">
        @endforeach
    </div>

</section>
<footer class="footer">
    <a href={{ url('catalogue') }} class="btn">
        <span>Enter</span>
    </a>
</footer>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        let currentIndex = 0;
        const items = $('.carousel-item');
        const itemCount = items.length;

        /**
         * Muestra el elemento en la posición index y oculta los demás.
         * @param {number} index - Índice del elemento a mostrar.
         * @returns {void}
         */
        function showItem(index) {
            items.hide();
            items.eq(index).show();
        }

        $('.carousel-next').click(function () {
            currentIndex = (currentIndex + 1) % itemCount;
            showItem(currentIndex);
        });

        $('.carousel-prev').click(function () {
            currentIndex = (currentIndex - 1 + itemCount) % itemCount;
            showItem(currentIndex);
        });

        // Inicializa el carrusel mostrando el primer elemento
        showItem(currentIndex);
    });
</script>
@endsection