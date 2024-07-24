@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'register')
@section('content')
    <header>
        <h1>Register</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll">
        <form action={{ route('register') }} method="POST" enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            @endif
            <div class="form-group">
                <img id="upload" class="mask" src="images/bg-upload-photo.svg" alt="Photo">
                <input id="photo" type="file" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-full-name.svg" alt="">
                    FullName </label>
                <input type="text" name="fullname" placeholder="fullname" maxlength="15">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-full-name.svg" alt="">
                    Document </label>
                <input type="text" name="document" placeholder="123456789" maxlength="15">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-full-name.svg" alt="">
                    Gender
                </label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-calendar.svg" alt="">
                    Birthday
                </label>
                <input type="date" name="birthdate">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-mail.svg" alt="">
                    Email
                </label>
                <input type="id" name="email" placeholder="example@mail.com">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-phone.svg" alt="">
                    Cellphone
                </label>
                <input type="number" name="phone" placeholder="123456789" maxlength="12">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-password.svg" alt="">
                    Password
                </label>
                <img class="ico-eye" src="images/ico-eye.svg" alt="Eyes">
                <input type="password" name="password" placeholder="∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="images/ico-password.svg" alt="">
                    Password Confirmed
                </label>
                <img class="ico-eye" src="images/ico-eye.svg" alt="Eyes">
                <input type="password" name="password_confirmation" placeholder="∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="images/content-btn-register.svg" alt="">
                </button>
                <a href="">Do you have a count?</a>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            //-------------------------------------------
            $togglePass = false;
            $('section').on('click', '.ico-eye', function() {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password')

                    !$togglePass ? $(this).attr('src', 'images/ico-eye-close.svg') :
                    $(this).attr('src', 'images/ico-eye.svg')
                $togglePass = !$togglePass
            })
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
        })
    </script>
@endsection
