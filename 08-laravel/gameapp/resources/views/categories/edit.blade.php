@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/show-profile.css') }}>
    <link rel="stylesheet" href={{ asset('css/show-categories.css') }}>
</head>
@section('title', 'GameApp - Edit User')
@section('content')
    <header class="header">
        <a href="{{ url('categories/' . $category->id) }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1 class="title  title-show-users">Edit Category</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll section-profile">
        <form action="{{ url('categories/' . $category->id) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            @method('PUT')
            <div class="section-profile-info-div">
                <input id="photo" type="file" name="photo" accept="image/*">
                <img id="upload" class="mask" src={{ asset('images/' . $category->image) }} alt="Photo">
                <input type="hidden" name="originphoto" value="{{ $category->image }}">
                <input type="hidden" name="id" value="{{ $category->image }}">
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Name :</strong>
                <input type="text" class="section-profile-info-div-input" name="name"
                    value={{ old('name', $category->name) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Description :</strong>
                <input type="text" class="section-profile-info-div-input"
                    name="description" value="{{ old('description', $category->description) }}">
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Birthdate :</strong>
                <input type="date" class="section-profile-info-div-input" name="releasedate"
                    value={{ old('releasedate', $category->releasedate) }}>
            </div>
            <footer class="footer">
                <button type="submit" class="btn">
                    <span>Edit Info</span>
                    <div class="dot"></div>
                </button>
            </footer>
        </form>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#upload').click(function(e) {
                $('#photo').click();
            });

            $('#photo').change(function(e) {
                e.preventDefault();
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#upload').attr('src', evt.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
