@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/catalogue.css') }}>
</head>
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
    <section class="scroll">
        <form action="" method="POST" id="form-filter">
            <input type="text" placeholder="Filter" id="form-filter-input">
        </form>
        @foreach ($categories as $category)
            <section class="categorie-section categorie-items">
                <div class="categorie-section-title">
                    <img src="{{ asset('images/slide01.png') }}" alt="categorie-image" id="categorie-section-title-image">
                    <h2>{{ $category->name }}</h2>
                </div>
                <div class="game-carousel">
                    @foreach ($games as $game)
                        @if ($game->category_id == $category->id)
                            <div class="game-section">
                                <div class="categorie-item">
                                    <img src="{{ asset('/images/games/' . $game->image) }}" alt=""
                                        class="game-section-img">
                                    <figcaption class="game-section-tittle">{{ $game->title }}</figcaption>
                                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const carousels = document.querySelectorAll('.game-carousel');
            carousels.forEach(carousel => {
                let index = 0;
                const items = carousel.querySelectorAll('.game-section');
                const totalItems = items.length;

                function showItem(index) {
                    items.forEach((item, i) => {
                        item.style.display = i === index ? 'block' : 'none';
                    });
                }

                showItem(index);

                const prevButton = carousel.parentElement.querySelector('.prev');
                const nextButton = carousel.parentElement.querySelector('.next');

                prevButton.addEventListener('click', () => {
                    index = (index > 0) ? index - 1 : totalItems - 1;
                    showItem(index);
                });

                nextButton.addEventListener('click', () => {
                    index = (index < totalItems - 1) ? index + 1 : 0;
                    showItem(index);
                });
            });
        });
    </script>
@endsection
