@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/catalogue.css') }}>
</head>
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')
@section('content')
    <header class="header">
        <a href={{ url('/') }} class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <h1 class="title">
            GameApp
        </h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <form action="" method="POST" id="form-filter">
            <input type="text" placeholder="Filter" id="form-filter-input">
        </form>
        @foreach ($categories as $category)
            <section class="categorie-section">
                <div class="categorie-section-title">
                    <img src="{{ asset('images/slide01.png') }}" alt="categorie-image" id="categorie-section-title-image">
                    <h2>{{ $category->name }}</h2>
                </div>
                <div class="categorie-section-dots">
                    <img src="{{ asset('images/btn-prev.svg') }}" alt="Btn-prev" id="categorie-section-dot-prev">
                    <img src="{{ asset('images/btn-next.svg') }}" alt="Btn-next" id="categorie-section-dot-next">
                </div>
                @foreach ($games as $game)
                    @if ($game->category_id == $category->id)
                        <div class="game-section">
                            <figure class="game-section-block1">
                                <img src="{{ asset('/images/games/' . $game->image) }}" alt="" class="game-section-img">
                                <figcaption class="game-section-tittle">{{ $game->title }}</figcaption>
                            </figure>
                            <article class="game-section-block2">{{$game->description}}</article>
                        </div>
                    @endif
                @endforeach
            </section>
        @endforeach
    </section>
@endsection
