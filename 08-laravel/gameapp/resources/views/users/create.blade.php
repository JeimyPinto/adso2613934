@extends('layouts.app')
@section('title', 'GameApp - Create User')
@section('class', 'add-user')
@section('content')
    <header class="header">
        <a href="{{ url('users') }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1 class="title">Add user</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <form action={{ url('users') }} method="POST" enctype="multipart/form-data" class="form">
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
                <input id="photo" type="file" name="photo" value="{{ old('photo') }}" accept="image/*">
            </div>
            <div class="form-group">
                <label for="fullname" class="form-group-label">
                    <img src={{ asset('images/ico-full-name.svg') }} alt="icon-full-name">
                    FullName
                </label>
                <input type="text" class="form-group-input" id="fullname" name="fullname" value="{{ old('fullname') }}"
                    placeholder="fullname">
            </div>
            <div class="form-group">
                <label for="document" class="form-group-label">
                    <img src={{ asset('images/ico-full-name.svg') }} alt="">
                    Document
                </label>
                <input type="text" class="form-group-input" id="document" name="document" value="{{ old('document') }}"
                    placeholder="123456789">
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-full-name.svg') }} alt="">
                    Gender
                </label>
                <select name="gender" value="{{ old('gender') }}" class="form-group-input">
                    <option value="male" class="form-group-input">Male</option>
                    <option value="female" class="form-group-input">Female</option>
                    <option value="other" class="form-group-input">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-calendar.svg') }} alt="">
                    Birthday
                </label>
                <input type="date" class="form-group-input" name="birthdate" value="{{ old('birthdate') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-mail.svg') }} alt="">
                    Email
                </label>
                <input type="id" name="email" value="{{ old('email') }}" class="form-group-input"
                    placeholder="example@mail.com">
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-phone.svg') }} alt="">
                    Cellphone
                </label>
                <input type="number" name="phone" value="{{ old('phone') }}" class="form-group-input"
                    placeholder="123456789">
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-password.svg') }} alt="">
                    Password
                </label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-group-input"
                    placeholder="∗∗∗∗∗∗∗∗∗∗">
                <img class="ico-eye" src={{ asset('images/ico-eye.svg') }} alt="Eyes">
            </div>
            <div class="form-group">
                <label for="" class="form-group-label">
                    <img src={{ asset('images/ico-password.svg') }} alt="">
                    Password Confirmed
                </label>
                <input type="password"class="form-group-input" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" placeholder="∗∗∗∗∗∗∗∗∗∗">
                <img class="ico-eye" src={{ asset('images/ico-eye.svg') }} alt="Eyes">
            </div>
            <footer class="footer">
                <button class="btn">
                    <span>Add User</span>
                    <div class="dot"></div>
                </button>
            </footer>
            <a href="" class="form-link">Do you have a count?</a>
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
