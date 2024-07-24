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
        <article class="categorie-article">
            <div class="categorie-title">
                <img src={{asset("images/slide01.png")}} alt="" id="categorie-articule-title-image">
                <h2> Aventura </h2>
            </div>
            <section class="owl-carousel">
                <figure>
                    <img src="images/slide-c1-01.png" alt="" class="slide">
                    <figcaption>Surfer Cat</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-05.png" alt="" class="slide">
                    <figcaption>Minecraft</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-03.png" alt="" class="slide">
                    <figcaption>Stardew Valley </figcaption>
                    <a href="view.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
            </section>
        </article>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 18,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            })
            $('header').on('click', '.btn-burger', '.btn-back', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
        })
    </script>
@endsection
