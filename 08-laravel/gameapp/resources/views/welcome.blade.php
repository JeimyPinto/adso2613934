@extends('layouts.app')

<head>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')
@section('content')
    <header class="header">
        <h1 class="title">
            GameApp
        </h1>
    </header>
    <section class="slider owl-carousel">
        <img src={{ asset('images/slide01.png') }} alt="Logo de la Aplicación" class="item">
        <img src={{ asset('images/slide02.png') }} alt="Logo de la Aplicación" class="item">
        <img src={{ asset('images/slide01.png') }} alt="Logo de la Aplicación" class="item">
    </section>
    <footer class="footer">
        <a href={{ url('catalogue') }} class="btn">
            <span>Enter</span>
            <div class="dot"></div>
        </a>
    </footer>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
                $('.owl-carousel').owlCarousel({
                    center: true,
                    loop: true,
                    nav: true,
                    margin: 60,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        }
                    }
                });
            }

        );
    </script>
@endsection
