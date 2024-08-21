@extends('layouts.app')
<head>
    <link rel="stylesheet" href={{ asset('css/show-categories.css') }}>
</head>
@section('title', 'GameApp - Create Categories')
@section('class', 'add-categories')
@section('content')
    <header class="header">
        <a href="{{ url('categories') }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1 class="title">Add Categorie</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <form action={{ url('categories') }} method="POST" enctype="multipart/form-data" class="form">
            @csrf
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            @endif
            <div class="form-group">
                <img id="upload" class="mask" src={{ asset('images/bg-upload-photo.svg') }} alt="Photo">
                <input id="photo" type="file" name="photo" value="{{ old('image') }}" accept="image/*">
            </div>
            <div class="form-group">
                <label for="fullname" class="form-group-label">
                    <img src={{ asset('images/ico-full-name.svg') }} alt="icon-full-name">
                    Name
                </label>
                <input type="text" class="form-group-input" id="name" name="name" value="{{ old('name') }}"
                    placeholder="name">
            </div>
            <div class="form-group">
                <label for="description" class="form-group-label">
                    <img src={{ asset('images/ico-description.svg') }} alt="">
                    Description
                </label>
                <input type="text" class="form-group-input" id="description" name="description" value="{{ old('description') }}"
                    placeholder="description">
            </div>
            <div class="form-group">
                <label for="document" class="form-group-label">
                    <img src={{ asset('images/ico-date.svg') }} alt="">
                    Release Date
                </label>
                <input type="date" class="form-group-input" id="releasedate" name="releasedate" value="{{ old('description') }}"
                    placeholder="releasedate">
            </div>
            <footer class="footer">
                <button class="btn">
                    <span>Add Categorie</span>
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
