@extends('layouts.app')
@section('title', 'GameApp - Profile')
@section('class', 'profile')
@section('content')
    <header>
        <a href="{{ url('/dashboard') }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1>Profile</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <img src={{ asset('images/no-photo.png') }} alt="" class="profile-photo">
        <article class="info-profile">
            <p>
                <strong>Name :</strong>
                <input type="text" value={{ $user->fullname }} disabled>
            </p>
            <p>
                <strong>Document :</strong>
                <input type="text" value={{ $user->document }} @disabled(true)>
            </p>
            <p>
                <strong>Role :</strong>
                <input type="text" value={{ $user->role }} disabled>
            </p>
            <p>
                <strong>Email :</strong>
                <input type="text" value={{ $user->email }} disabled>
            </p>
            <p>
                <strong>Birthdate :</strong>
                <input type="text" value={{ $user->birthdate }} disabled>
            </p>
            <p>
                <strong>Phone :</strong>
                <input type="text" value={{ $user->phone }} disabled>
            </p>
            <p>
                <strong>Gender :</strong>
                <input type="text" value={{ $user->gender }} disabled>
            </p>
        </article>
    </section>
@endsection
@section('js')
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
        })
    </script>
@endsection
