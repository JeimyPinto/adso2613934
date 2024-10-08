@extends('layouts.app')
@section('title', 'GameApp - Edit Games')
@section('class', 'add-games')
@section('content')
<header class="header">
    <a href="{{ url('categories') }}" class="btn-back">
        <img src={{ asset('images/btn-back.svg') }} alt="Back">
    </a>
    <h1 class="title">Edit Game</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')
<section class="scroll">
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        @endif
        <div class="form-group">
            <input id="photo" type="file" name="photo" accept="image/*">
            <img id="upload" class="mask" src={{ asset('images/games/' . $game->image) }} alt="Photo">
            <input type="hidden" name="originphoto" value="{{ $game->image }}">
            <input type="hidden" name="id" value="{{ $game->image }}">
        </div>
        <div class="form-group">
            <label for="title" class="form-group-label">
                <img src={{ asset('images/ico-name.svg') }} alt="icon-title">
                Title
            </label>
            <input type="text" class="section-profile-info-div-input" id="title" name="title"
                value="{{ $game->title }}">
        </div>

        <div class="form-group">
            <label for="developer" class="form-group-label">
                <img src={{ asset('images/ico-full-name.svg') }} alt="icon-developer">
                Developer
            </label>
            <input type="text" class="section-profile-info-div-input" id="developer" name="developer"
                value="{{ $game->developer }}">
        </div>

        <div class="form-group">
            <label for="category_id" class="form-group-label">
                <img src={{ asset('images/ico-category.svg') }} alt="icon-category">
                Category
            </label>
            <select class="section-profile-info-div-input" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $game->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="slider" class="form-group-label">
                <img src={{ asset('images/ico-categories-module.svg') }} alt="icon-slider">
                Slider
            </label>
            <select name="slider" id="slider" class="section-profile-info-div-input">
                <option value="">Select</option>
                <option value="1" {{ $game->slider == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $game->slider == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-group-label">
                <img src={{ asset('images/ico-description.svg') }} alt="icon-description">
                Description
            </label>
            <textarea class="section-profile-info-div-input description" id="description"
                name="description">{{ $game->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="gender" class="form-group-label">
                <img src={{ asset('images/ico-full-name.svg') }} alt="icon-gender">
                Gender
            </label>
            <input type="text" class="section-profile-info-div-input" id="gender" name="gender"
                value="{{ $game->gender }}">
        </div>

        <div class="form-group">
            <label for="price" class="form-group-label">
                <img src={{ asset('images/ico-details.svg') }} alt="icon-price">
                Price
            </label>
            <input type="decimal" class="section-profile-info-div-input" id="price" name="price"
                value="{{ $game->price }}">
        </div>

        <div class="form-group">
            <label for="releasedate" class="form-group-label">
                <img src={{ asset('images/ico-year.svg') }} alt="icon-releasedate">
                Release Date
            </label>
            <input type="date" class="section-profile-info-div-input" id="releasedate" name="releasedate"
                value="{{ $game->releasedate }}">
        </div>
        <input type="hidden" value="gender" name="gender">
        <footer class="footer">
            <button class="btn">
                <span>Save Changes</span>
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