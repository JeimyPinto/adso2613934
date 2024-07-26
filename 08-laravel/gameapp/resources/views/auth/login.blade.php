@extends('layouts.app')
@section('title', 'GameApp - Login')
@section('class', 'login')
@section('content')
    <header class="header">
        <a href={{ url('/catalogue') }} class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <h1 class="title">Login</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <form action="{{ route('login') }}" method="POST" class="form">
            @csrf
            @if (count($errors->all()) > 0)
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <div class="form-group">
                <label for="email" class="form-group-label">
                    <img src="images/ico-mail.svg" alt="">
                    Email
                </label>
                <input type="email" id="email"class="form-group-input" name="email" placeholder="example@mail.com">
            </div>
            <div class="form-group">
                <label for="password" class="form-group-label">
                    <img src="images/ico-password.svg" alt="">
                    Password
                </label>
                <input type="password" id="password" class="form-group-input" name="password" placeholder="∗∗∗∗∗∗∗∗∗∗">
                <img class="ico-eye" src="images/ico-eye.svg" alt="Eyes">
            </div>
            <footer class="footer">
                <button href="" class="btn">
                    <span>Login</span>
                    <div class="dot"></div>
                </button>
            </footer>
            <a href={{ route('password.request') }} class="form-link">Forgot your password?</a>
        </form>
    </section>
@endsection
