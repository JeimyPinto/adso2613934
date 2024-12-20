<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    @yield('css_link')
</head>

<body>
    <main class="container @yield('class')">
        @yield('content')
    </main>
    <script src={{ asset('js/jquery-3.7.1.min.js') }}></script>
    <script>
        $(document).ready(function () {
            $('header').on('click', '.btn-burger', function () {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            });
            $togglePass = false;
            $('section').on('click', '.ico-eye', function () {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password')

                !$togglePass ? $(this).attr('src', 'images/ico-eye-close.svg') :
                    $(this).attr('src', 'images/ico-eye.svg')
                $togglePass = !$togglePass
            })
        });
    </script>
    @yield('js')
</body>

</html>