@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/view-game.css') }}>
</head>

@section('title', 'GameApp - View Game')
@section('class', 'catalogue')
@section('content')

<header class="header">
    <a href={{ url('/catalogue') }} class="btn-back">
        <img src="{{asset("images/btn-back.svg")}}" alt="Back">
    </a>
    <h1 class="title"> View Game </h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')

<section class="scroll">
    <article class="categorie-section">
        <div class="categorie-section-div-img">
            <img id="upload" class="mask" src="{{ asset('images/games/' . $game->image) }}" alt="Photo">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Title</strong>
            <span class="section-profile-info-div-span">{{$game->title}}</span>
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Developer</strong>
            <span class="section-profile-info-div-span">{{$game->developer}}</span>
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Release Date</strong>
            <span class="section-profile-info-div-span">{{$game->releasedate}}</span>
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Category ID</strong>
            <span class="section-profile-info-div-span">{{$game->category_id}}</span>
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Price</strong>
            <span class="section-profile-info-div-span">{{$game->price}}</span>
        </div>
        <div class="categorie-section-div">
            <strong class="categorie-section-div-strong">Slider</strong>
            <span class="section-profile-info-div-span">{{$game->slider}}</span>
        </div>
        <div class="categorie-section-div-description">
            <strong class="categorie-section-div-strong">Description</strong>
            <p class="section-profile-info-div-p">{{$game->description}}</p>
        </div>
        <div class="categorie-section-div-btn">
            @guest
                <a href="{{ url('/login') }}" class="btn not-allowed">
                <span>Add to collection</span>
                <div class="dot"></div>
                </a>
            @endguest

            @auth
                @if (Auth::user()->role == 'Customer')
                    <a href="{{ url('catalogue/add/' . $game->id) }}" class="btn">
                        <span>Add to collection</span>
                        <div class="dot"></div>
                    </a>
                @else
                    <a href="{{ route('games.edit', $game->id) }}" class="btn">
                        <span>Edit Info</span>
                    </a>
                @endif
            @endauth
        </div>
    </article>
</section>
@endsection