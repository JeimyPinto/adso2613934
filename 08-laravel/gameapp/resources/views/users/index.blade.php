@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'module-users')

@section('content')
    <header class="header">
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <h1 class="title">Users</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="module-info-resources">
        <a href={{ url('profile/edit') }} class="btn">
            <span>Add</span>
            <div class="dot"></div>
        </a>
        @foreach ($users as $user)
            <article class="module-info-resources-article">
                <img src={{ asset('images/profile/' . $user->photo) }} class="module-info-resources-article-img"
                    alt="">
                <div class="article-info-user">
                    <span>{{ $user->fullname }}</span>
                    <strong id="article-info-user-role">{{ $user->role }}</strong>
                </div>
                <div class="btns-crud">
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/ico-details.svg" alt="" id="module-info-resources-article-details">
                    </a>
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/ico-edit.svg" alt="" id="module-info-resources-article-edit">
                    </a>
                    <a href="">
                        <img src="images/ico-delete.svg" alt="" id="module-info-resources-article-delete">
                    </a>
                </div>
            </article>
        @endforeach
    </section>
    <div class="paginate">
        {{ $users->links('layouts.paginator') }}
    </div>
@endsection
