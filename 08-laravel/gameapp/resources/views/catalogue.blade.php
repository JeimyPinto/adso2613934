@extends('layouts.app')
@section('css_link')
<link rel="stylesheet" href="{{ asset('css/catalogue.css') }}">
@endsection
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')
@section('content')
<header class="header">
    <a href={{ url('/') }} class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <h1 class="title">
        GameApp
    </h1>
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
        <section class="categorie-section">
            <div class="categorie-section-title">
                <img src="{{ asset('images/slide01.png') }}" alt="categorie-image" id="categorie-section-title-image">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="game-carousel">
                @foreach ($games as $game)
                    @if ($game->category_id == $category->id)
                        <div class="game-section">
                            <a href="{{ url('catalogue/' . $game->id) }}" class="categorie-item">
                                <img src="{{ asset('/images/games/' . $game->image) }}" alt="" class="game-section-img">
                                <span class="game-section-span">{{ $game->title }}</s>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="prev">
                <img src="{{ asset('images/btn-prev.svg') }}" alt="">
            </button>
            <button class="next">
                <img src="{{ asset('images/btn-next.svg') }}" alt="">
            </button>
        </section>
    @endforeach
</section>
@endsection

@section('js')
<script>
    function initializeCarousels() {
        const carousels = document.querySelectorAll('.game-carousel');
        carousels.forEach(carousel => {
            let index = 0;
            const items = carousel.querySelectorAll('.game-section');
            const totalItems = items.length;

            function showItems(index) {
                items.forEach((item, i) => {
                    item.style.display = (i >= index && i < index + 2) ? 'block' : 'none';
                });
            }

            showItems(index);

            const prevButton = carousel.parentElement.querySelector('.prev');
            const nextButton = carousel.parentElement.querySelector('.next');

            prevButton.addEventListener('click', () => {
                index = (index > 0) ? index - 2 : totalItems - 2;
                showItems(index);
            });

            nextButton.addEventListener('click', () => {
                index = (index < totalItems - 2) ? index + 2 : 0;
                showItems(index);
            });
        });
    }
    document.addEventListener('DOMContentLoaded', function () {
        initializeCarousels();

        //Capturamos el evento keyup en el input de filtro
        $("#form-filter-input").on('keyup', function (e) {
            e.preventDefault();
            var query = $(this).val();
            var token = '{{ csrf_token() }}'; // Obtén el token CSRF desde Blade

            $.ajax({
                url: "{{ url('games/search') }}",
                method: 'POST',
                data: {
                    _token: token,
                    query: query
                },
                success: function (data) {
                    $('.scroll').html(data);
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