@extends('layouts.app')
@section('title', 'GameApp - Users Module')

@section('content')
    <header class="header">
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <h1 class="title">Users</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuBurguer')
    <section class="module-info-resources">
        <a href={{ url('users/create') }} class="btn">
            <span>Add</span>
            <div class="dot"></div>
        </a>
        <input name="qsearch" id="form-filter-input" type="text" placeholder="Filter" class="qsearch ">
    </section>
    <section class="module-info-resources data">
        @foreach ($users as $user)
            <article class="module-info-resources-article">
                <img src={{ asset('images/profile/' . $user->photo) }} class="module-info-resources-article-img"
                    alt="">
                <div class="article-info-user">
                    <span>{{ $user->fullname }}</span>
                    <strong id="article-info-user-role">{{ $user->role }}</strong>
                </div>
                <div class="btns-crud">
                    <a href="{{ url('users/' . $user->id) }}">
                        <img src="images/ico-details.svg" alt="" id="module-info-resources-article-details">
                    </a>
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/ico-edit.svg" alt="" id="module-info-resources-article-edit">
                    </a>
                    <button type="button" class="btn-delete" data-toggle="modal" data-target="#deleteModal"
                        data-id="{{ $user->id }}">
                        <img src="images/ico-delete.svg" alt="" id="module-info-resources-article-delete">
                    </button>
                </div>
            </article>
        @endforeach
    </section>
    <div class="paginate">
        {{ $users->links('layouts.paginator') }}
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.qsearch').on('keyup', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = $('input[name=_token]').val();
                var model = 'users';

                $.post(model + '/search', {
                        q: query,
                        _token: token
                    },
                    function(data) {
                        $('.data').html(data);
                    }
                ).fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud: ' + textStatus, errorThrown);
                });
            });
        });
    </script>
@endsection
