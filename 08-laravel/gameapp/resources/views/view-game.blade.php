@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/show-users.css') }}>
    <link rel="stylesheet" href={{ asset('css/catalogue.css') }}>
    <link rel="stylesheet" href={{ asset('css/show-profile.css') }}>
</head>

@section('title', 'GameApp - View Game')
@section('class', 'catalogue')
@section('content')

<header class="header">
    <a href={{ url('/catalogue') }} class="btn-back">
        <img src="{{asset("images/btn-back.svg")}}" alt="Back">
    </a>
    <h1 class="title-show-users">
        View Game
    </h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')

<section class="scroll section-profile">
    <article class="categorie-section">
        <div class="section-profile-info-div">
            <img id="upload" class="mask" src="{{ asset('images/games/' . $game->image) }}" alt="Photo">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Title</strong>
            <span class="section-profile-info-div-span">{{$game->title}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Developer</strong>
            <span class="section-profile-info-div-span">{{$game->developer}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Release Date</strong>
            <span class="section-profile-info-div-span">{{$game->releasedate}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Category ID</strong>
            <span class="section-profile-info-div-span">{{$game->category_id}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Price</strong>
            <span class="section-profile-info-div-span">{{$game->price}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label" class="section-profile-info-div-input">Slider</strong>
            <span class="section-profile-info-div-span">{{$game->slider}}</span>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Description</strong>
            <p class="section-profile-info-div-p">{{$game->description}}</p>
        </div>
        <div class="section-profile-info-div">
            @guest
                <a href="{{ url('/login') }}" class="btn not-allowed">
                    <span>Add</span>
                    <div class="dot"></div>
                </a>
            @endguest

            @auth
                @if (Auth::user()->role == 'Customer')
                    <a href="{{ url('catalogue/add/' . $game->id) }}" class="btn">
                        <span>Add</span>
                        <div class="dot"></div>
                    </a>
                @else
                    <a href="{{ route('games.edit', $game->id) }}" class="btn">
                        <span>Edit Info</span>
                        <div class="dot"></div>
                    </a>
                @endif
            @endauth
        </div>
    </article>
</section>
@endsection