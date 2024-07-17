@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')
@section('content')
    <header>
        <img src={{ asset('images/logo-welcome.svg') }} alt="">
    </header>
    <section class="slider owl-carousel">
        <img src={{ asset('images/slide01.png') }} alt="Logo de la Aplicación" class="item">
        <img src={{ asset('images/slide02.png') }} alt="Logo de la Aplicación" class="item">
        <img src={{ asset('images/slide01.png') }} alt="Logo de la Aplicación" class="item">
    </section>
    <footer>
        <a href={{ url('catalogue') }} class="btn btn-explore">
            <img id="myImage" src={{ asset('images/content-btn-welcome.svg') }} alt="Explore">
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
