@extends('layouts.app')

<head>
    <link rel="stylesheet" href={{ asset('css/show-profile.css') }}>
</head>
@section('title', 'GameApp - Edit User')
@section('content')
    <header class="header">
        <a href="{{ url('users/'. $user->id) }}" class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <h1 class="title  title-show-users">Edit User</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="scroll section-profile">
        <form action="{{ url('users/' . $user->id) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            @method('PUT')
            <div class="section-profile-info-div">
                <input id="photo" type="file" name="photo" accept="image/*">
                <img id="upload" class="mask" src={{ asset('images/profile/' . $user->photo) }} alt="Photo">
                <input type="hidden" name="originphoto" value="{{ $user->photo }}">
                <input type="hidden" name="id" value="{{ $user->photo }}">
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Name :</strong>
                <input type="text" class="section-profile-info-div-input" name="fullname"
                    value={{ old('fullname', $user->fullname) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Document :</strong>
                <input type="text" class="section-profile-info-div-input"
                    name="document"value={{ old('document', $user->document) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Role :</strong>
                <select name="role" id="" class="section-profile-info-div-input">
                    <option class="section-profile-info-div-option" value="Administrador"
                        @if (old('gender', $user->role) == 'Administrador') selected @endif>Administrador</option>
                    <option class="section-profile-info-div-option" value="Customer"
                        @if (old('gender', $user->role) == 'Customer') selected @endif>Customer</option>
                </select>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Email :</strong>
                <input type="text" class="section-profile-info-div-input" name="email"
                    value={{ old('email', $user->email) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Birthdate :</strong>
                <input type="date" class="section-profile-info-div-input" name="birthdate"
                    value={{ old('birthdate', $user->birthdate) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label"class="section-profile-info-div-input">Phone :</strong>
                <input type="text" class="section-profile-info-div-input"
                    name="phone"value={{ old('phone', $user->phone) }}>
            </div>
            <div class="section-profile-info-div">
                <strong class="section-profile-info-div-label">Gender :</strong>
                <select name="gender" id="" class="section-profile-info-div-input">
                    <option class="section-profile-info-div-option" value="Female"
                        @if (old('gender', $user->gender) == 'Female') selected @endif>Female</option>
                    <option class="section-profile-info-div-option" value="Male"
                        @if (old('gender', $user->gender) == 'Male') selected @endif>Male</option>
                </select>
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
