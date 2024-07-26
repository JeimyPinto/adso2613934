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
    <section class="carousel">
        <img src="{{ asset('images/slide01.png') }}" alt="Logo de la Aplicación" class="carousel-item active">
        <img src="{{ asset('images/slide02.png') }}" alt="Logo de la Aplicación" class="carousel-item">
        <img src="{{ asset('images/slide01.png') }}" alt="Logo de la Aplicación" class="carousel-item">
        <div class="carousel-controls">
            <button class="carousel-prev">
                <img src="{{ asset('images/btn-prev.svg') }}" alt="Previous">
            </button>
            <button class="carousel-next">
                <img src="{{ asset('images/btn-next.svg') }}" alt="Next">
            </button>
        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            function showItem(index) {
                items.forEach((item, i) => {
                    item.classList.remove('active', 'prev', 'next');
                    if (i === index) {
                        item.classList.add('active');
                    } else if (i === (index - 1 + totalItems) % totalItems) {
                        item.classList.add('prev');
                    } else if (i === (index + 1) % totalItems) {
                        item.classList.add('next');
                    }
                });
            }

            function nextItem() {
                currentIndex = (currentIndex + 1) % totalItems;
                showItem(currentIndex);
            }

            function prevItem() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                showItem(currentIndex);
            }

            document.querySelector('.carousel-next').addEventListener('click', nextItem);
            document.querySelector('.carousel-prev').addEventListener('click', prevItem);

            // Auto-slide every 3 seconds
            setInterval(nextItem, 5000);

            // Show the first item initially
            showItem(currentIndex);
        });
    </script>
@endsection
