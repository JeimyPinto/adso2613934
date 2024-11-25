@extends('layouts.app')
@section('css_link')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')
@section('content')
<header class="header">
    <a href={{ url('/') }} class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <h1 class="title"> GameApp </h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')
<input type="text" placeholder="Filter" id="form-filter-input" name="querty">
<section class="scroll">
    @foreach ($categories as $category)
        <div class="carousel-catalogue">
            <div class="carousel-section-title">
                <img src="{{ asset('images/slide01.png') }}" alt="categorie-image">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="carousel-controls">
                <button class="prev">
                    <img src="{{ asset('images/btn-prev.svg') }}" alt="Previous">
                </button>
                <button class="next">
                    <img src="{{ asset('images/btn-next.svg') }}" alt="Next">
                </button>
            </div>
            <div class="carousel-inner">
                @foreach ($games as $game)
                    @if ($game->category_id == $category->id)
                        <a href="{{ url('catalogue/' . $game->id) }}" class="carousel-item-short">
                            <img src="{{ asset('/images/games/' . $game->image) }}" alt="">
                            <span class="game-section-span">{{ $game->title }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</section>
@endsection
@section('js')
<script>
    function initializeCarousels() {
        const carousels = document.querySelectorAll('.carousel-catalogue');
        carousels.forEach(carousel => {
            let index = 0;
            const items = Array.from(carousel.getElementsByClassName('carousel-item-short'));
            const totalItems = items.length;

            // Función para mostrar los elementos
            function showItems(index) {
                items.forEach((item, i) => {
                    item.classList.toggle('active', i === index);
                });
            }

            showItems(index);

            const prevButton = carousel.querySelector('.prev');
            const nextButton = carousel.querySelector('.next');

            // Elimina los event listeners anteriores si existen
            prevButton.removeEventListener('click', prevButton._clickHandler);
            nextButton.removeEventListener('click', nextButton._clickHandler);

            // Define los nuevos event listeners
            prevButton._clickHandler = () => {
                index = (index > 0) ? index - 1 : totalItems - 1;
                showItems(index);
            };

            nextButton._clickHandler = () => {
                index = (index < totalItems - 1) ? index + 1 : 0;
                showItems(index);
            };

            // Añade los nuevos event listeners
            prevButton.addEventListener('click', prevButton._clickHandler);
            nextButton.addEventListener('click', nextButton._clickHandler);
        });
    };

    document.addEventListener('DOMContentLoaded', function () {
        initializeCarousels();

        // Capturamos el evento keyup en el input de filtro
        $("#form-filter-input").on('keyup', function (e) {
            e.preventDefault();
            var query = $(this).val();
            var token = '{{ csrf_token() }}';

            $.ajax({
                url: "{{ url('games/search') }}",
                method: 'POST',
                data: {
                    _token: token,
                    query: query
                },
                success: function (data) {
                    $('.carousel-catalogue').html(data);
                    initializeCarousels();
                },
                error: function () {
                    console.log('Error en la petición');
                }
            });
        });
    });
</script>
@endsection