@extends('layouts.app')
@section('title', 'GameApp - Login')
@section('class', 'login')
@section('content')
    <header>
        <h1>Login</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>

    @include('layouts.menuBurguer')

    <section class="scroll">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (count($errors->all()) > 0)
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <div class="form-group">
                <label for="email">
                    <img src="images/ico-mail.svg" alt="">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="example@mail.com">
            </div>
            <div class="form-group">
                <label for="password">
                    <img src="images/ico-password.svg" alt="">
                    Password
                </label>
                <img class="ico-eye" src="images/ico-eye.svg" alt="Eyes">
                <input type="password" id="password" name="password" placeholder="∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="images/content-btn-login.svg" alt="">
                </button>
                <a href={{ route('password.request') }}>Forgot your password?</a>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script>
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
    </script>
@endsection
