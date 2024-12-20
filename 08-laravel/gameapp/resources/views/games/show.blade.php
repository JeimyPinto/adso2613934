@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/show-users.css') }}>
    <link rel="stylesheet" href={{ asset('css/show-profile.css') }}>
</head>
@section('title', 'GameApp - Show Game')
@section('content')
<header class="header">
    <a href="{{ url('/games') }}" class="btn-back">
        <img src={{ asset('images/btn-back.svg') }} alt="Back">
    </a>
    <h1 class="title  title-show-users">Show Game</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')
<section class="scroll section-profile">
    <article class="form section-profile-info">
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset('images/games/' . $game->image) }}" alt="Photo">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Title :</strong>
            <input type="text" class="section-profile-info-div-input" value={{ $game->title }} disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Developer :</strong>
            <input type="text" class="section-profile-info-div-input" value={{ $game->developer }} disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Release Date :</strong>
            <input type="text" class="section-profile-info-div-input" value={{ $game->releasedate }} disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Category ID :</strong>
            <input type="text" class="section-profile-info-div-input" value={{ $game->category_id }} disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Price :</strong>
            <input type="text" class="section-profile-info-div-input" value={{ $game->price }} disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label" class="section-profile-info-div-input">Slider :</strong>
            <input type="text" class="section-profile-info-div-input" value="{{ $game->slider == 1 ? 'Active' : 'Inactive' }}" disabled>
        </div>
        <div class="section-profile-info-div">
            <strong class="section-profile-info-div-label">Description :</strong>
            <textarea type="text" class="section-profile-info-div-input description"
                disabled>{{ $game->description }}</textarea>
        </div>
        <footer class="footer">
            <a href={{ route('games.edit', $game->id) }} class="btn">
                <span>Edit Info</span>
                <div class="dot"></div>
            </a>
        </footer>
    </article>
</section>
@endsection