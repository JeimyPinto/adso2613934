@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/show-users.css') }}>
    <link rel="stylesheet" href={{ asset('css/show-profile.css') }}>
</head>
@section('title', 'GameApp - Show User')
@section('content')
    <header class="header">
        <a href="{{ url('/users') }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1 class="title  title-show-users">Show User</h1>
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
                <img id="upload" class="mask" src={{ asset('images/profile/' . $user->photo) }} alt="Photo">
                <input id="photo" type="file" name="photo" accept="image/*">
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Name :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->fullname }} disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Document :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->document }}disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Role :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->role }} disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Email :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->email }} disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Birthdate :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->birthdate }} disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label"class="section-profile-info-div-input">Phone :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->phone }} disabled>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Gender :</strong>
                <input type="text" class="section-profile-info-div-input" value={{ $user->gender }} disabled>
            </div>
            <footer class="footer">
                <a href={{ route('users.edit', $user->id) }} class="btn">
                    <span>Edit Info</span>
                    <div class="dot"></div>
                </a>
            </footer>
        </article>
    </section>
@endsection
