@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/dashboard.css') }}>
</head>
@section('title', 'GameApp - Dashboard')
@section('class', 'dashboard')
@section('content')
    <header class="header">
        <a href="{{ url('/') }}" class="btn-back">
            <img src="images/btn-back.svg" alt="GameApp">
        </a>
        <h1 class="title">Dashboard</h1>
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
            <span>{{ count($users) }} Rows</span>
        </div>
        <div class="module">
            <img src="images/ico-categories-module.svg" alt="">
            <strong>Module</strong>
            <img src="images/content-btn-categories-module.svg" alt="">
            <a href="module-categories.html" class="btn-more">view </a>
            <span>{{ count($categories) }} Rows</span>
        </div>
        <div class="module">
            <img src="images/ico-games-module.svg" alt="">
            <strong>Module</strong>
            <img src="images/content-btn-games-module.svg" alt="">
            <a href="module.games.html" class="btn-more">view </a>
            <span>{{ count($games) }} Rows</span>
        </div>
    </section>
@endsection
