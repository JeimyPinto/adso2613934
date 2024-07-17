@extends('layouts.app')
@section('title', 'GameApp - Dashboard')
@section('class', 'dashboard')
@section('content')
    <header>
        <h1>Dashboard</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')

    <section class="modules">
        <div class="module">
            <img src="images/ico-users-module.svg" alt="">
            <strong>Module</strong>
            <img src="images/content-btn-users-module.svg" alt="">
            <a href="{{ url('users') }}" class="btn-more">view </a>
            <span>6 rows</span>
        </div>
        <div class="module">
            <img src="images/ico-categories-module.svg" alt="">
            <strong>Module</strong>
            <img src="images/content-btn-categories-module.svg" alt="">
            <a href="module-categories.html" class="btn-more">view </a>
            <span>120 rows</span>
        </div>
        <div class="module">
            <img src="images/ico-games-module.svg" alt="">
            <strong>Module</strong>
            <img src="images/content-btn-games-module.svg" alt="">
            <a href="module.games.html" class="btn-more">view </a>
            <span>20 rows</span>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            //-------------------------------------------
            $togglePass = false;
            $('section').on('click', '.ico-eye', function() {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password')

                    !$togglePass ? $(this).attr('src', 'images/ico-eye-close.svg') :
                    $(this).attr('src', 'images/ico-eye.svg')
                $togglePass = !$togglePass
            })
            $('#upload').click(function(e) {
                $('#photo').click();
            });

            $('#photo').change(function(e) {
                e.preventDefault();
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#upload').attr('src', evt.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endsection
