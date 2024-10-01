@extends('layouts.app')
@section('title', 'GameApp - Create Games')
@section('class', 'add-games')
@section('content')
<header class="header">
    <a href="{{ url('categories') }}" class="btn-back">
        <img src={{ asset('images/btn-back.svg') }} alt="Back">
    </a>
    <h1 class="title">Add Game</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')
<section class="scroll">
    <form action={{ url('games') }} method="POST" enctype="multipart/form-data" class="form">
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
            <input id="photo" type="file" name="image" value="{{ old('image') }}" accept="image/*">
        </div>
        <div class="form-group">
            <label for="fullname" class="form-group-label">
                <img src={{ asset('images/ico-full-name.svg') }} alt="icon-full-name">
                User
            </label>
            <span class="form-group-input" name="user_id">{{Auth::user()->fullname}}</span>
        </div>
        <div class="form-group">
            <label for="fullname" class="form-group-label">
                <img src={{ asset('images/ico-full-name.svg') }} alt="icon-full-name">
                Title
            </label>
            <input type="text" class="section-profile-info-div-input" id="title" name="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="fullname" class="form-group-label">
                <img src={{ asset('images/ico-full-name.svg') }} alt="icon-full-name">
                Developer
            </label>
            <input type="text" class="section-profile-info-div-input" id="name" name="developver"
                placeholder="developver">
        </div>
        <div class="form-group">
            <label for="fullname" class="form-group-label">
                <img src={{ asset('images/ico-details.svg') }} alt="icon-price">
                Price
            </label>
            <input type="text" class="section-profile-info-div-input" id="price" name="price" placeholder="price">
        </div>
        <div class="form-group">
            <label for="document" class="form-group-label">
                <img src={{ asset('images/ico-year.svg') }} alt="">
                Release Date
            </label>
            <input type="date" class="section-profile-info-div-input" id="releasedate" name="releasedate"
                value="{{ old('releasedate') }}" placeholder="releasedate">
        </div>
        <div class="form-group">
            <label class="form-group-label">
                <img src="{{asset('images/ico-description.svg')}}" alt="">
                Description
            </label>
            <textarea type="text" class="section-profile-info-div-input description" name="description">
                </textarea>
        </div>
        <div class="form-group">
            <label for="category" class="form-group-label">
                <img src={{ asset('images/ico-categories-module.svg') }} alt="">
                Category
            </label>
            <select name="gender" id="" class="section-profile-info-div-input">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <footer class="footer">
            <button class="btn">
                <span>Add Game</span>
                <div class="dot"></div>
            </button>
        </footer>
    </form>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#upload').click(function (e) {
            $('#photo').click();
        });

        $('#photo').change(function (e) {
            e.preventDefault();
            let reader = new FileReader();
            reader.onload = function (evt) {
                $('#upload').attr('src', evt.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection