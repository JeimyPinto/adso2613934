@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')
@section('content')
    <header>
        <a href={{url('/')}} class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <img src="images/logo-welcome.svg" alt="logo" class="logo-top">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    <nav class="nav">
        <menu>
            <a href={{url('login')}}>
                <img src="images/ico-login.svg" alt="Login">
                <span>Login</span>
            </a>
            <a href={{url('register')}}>
                <img src="images/ico-register.svg" alt="Register">
                <span>Register</span>
            </a>
            <a href={{url('catalogue')}}>
                <img src="images/ico-catalogue.svg" alt="Catalogue">
                <span>Catalogue</span>
            </a>
        </menu>
    </nav>
    <section class="scroll">
        <form action="" method="POST">
            <input type="text" placeholder="Filter" maxlength="12">
        </form>
        <article>
            <div class="category-block">
                <img src="images/slide01.png" alt="">
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
        <article>
            <div class="category-block">
                <img src="images/slide01.png" alt="">
                <h2> Batle Royale </h2>
            </div>
            <section class="owl-carousel">
                <figure>
                    <img src="images/slide-c1-04.png" alt="" class="slide">
                    <figcaption>Fornite</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-02.png" alt="" class="slide">
                    <figcaption>Super Animal Royale</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-01.png" alt="" class="slide">
                    <figcaption>Surfer Cat </figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
            </section>
        </article>
        <article>
            <div class="category-block">
                <img src="images/slide01.png" alt="">
                <h2> Free to Play </h2>
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
                    <img src="images/slide-c1-02.png" alt="" class="slide">
                    <figcaption>Super Animal Royale</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="images/ico-more.svg" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-04.png" alt="" class="slide">
                    <figcaption>Fornite </figcaption>
                    <a href="view-game.html" class="btn-more">
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
