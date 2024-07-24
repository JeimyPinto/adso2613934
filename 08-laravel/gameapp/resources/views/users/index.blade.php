@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'module-users')

@section('content')
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <h1>Users</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')

    <section>
        <a href="{{ url('users/create') }}">
            <button type="submit">
                <img src="{{ asset('images/content-btn-add.svg') }}" alt="">
            </button>
        </a>
        @foreach ($users as $user)
            <article>
                <img src={{asset('images/profile/'. $user->photo)}} alt="">
                <div class="info-user">
                    <span>{{ $user->fullname }}</span>
                    <strong>{{ $user->role }}</strong>
                </div>
                <div class="btn-crud">
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/ico-edit.svg" alt="" id="edit">
                    </a>
                    <img src="images/ico-delete.svg" alt="" id="delete">
                </div>
            </article>
        @endforeach
    </section>
    <div class="paginate">
        {{ $users->links('layouts.paginator') }}
    </div>
@endsection
