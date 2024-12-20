@extends('layouts.app')
<head>
    <link rel="stylesheet" href={{ asset('css/show-games.css') }}>
</head>
@section('title', 'GameApp - Games Module')

@section('content')
<header class="header">
    <a href="{{ url('dashboard') }}" class="btn-back">
        <img src={{ asset('images/btn-back.svg') }} alt="Back">
    </a>
    <h1 class="title">Games</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuBurguer')
<div class="options-info-resources">
    <a href={{ url('games/create') }} class="btn btn-short">
        <span>+</span>
    </a>
    <a href={{ url('export/games/pdf') }} class="btn btn-short">
        <img src={{ asset('images/ico-pdf.svg') }} alt="" class="btn-short-img">
    </a>
    <a href={{ url('export/games/excel') }} class="btn btn-short">
        <img src={{ asset('images/ico-excel.svg') }} alt="" class="btn-short-img">
    </a>
</div>
<input name="qsearch" id="form-filter-input" type="text" placeholder="Filter" class="qsearch">
<section class="module-info-resources">
    @foreach ($games as $game)
        <article class="module-info-resources-article">
            <img src="{{ asset('images/games/' . $game->image) }}" class="module-info-resources-article-img" alt="">
            <div class="article-info-user">
                <span>{{ $game->title }}</span>
                <span>{{ $game->category->name }}</span>
            </div>
            <div class="btns-crud">
                <a href="{{ url('games/' . $game->id) }}">
                    <img src="images/ico-details.svg" alt="" id="module-info-resources-article-details">
                </a>
                <a href="{{ url('games/' . $game->id . '/edit') }}">
                    <img src="images/ico-edit.svg" alt="" id="module-info-resources-article-edit">
                </a>
                <button type="button" class="btn-delete" data-toggle="modal" data-target="#deleteModal"
                    data-id="{{ $game->id }}">
                    <img src="images/ico-delete.svg" alt="" id="module-info-resources-article-delete">
                </button>
                <form action="{{ url('games/' . $game->id) }}" method="post" class="delete-form">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </article>
    @endforeach
</section>
<div class="paginate">
    {{ $games->links('layouts.paginator') }}
</div>
<div class="modal">
    <span>
        ¿Are you sure you want to delete this user?
    </span>
    <div class="modal-options">
        <button type="button" class="btn btn-short" id="btn-no" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-short" id="btn-yes" form="deleteForm">Yes</button>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.btn-delete').on('click', function () {
            $('.modal').addClass('active');
            $('#btn-yes').on('click', () => {
                var id = $(this).data('id');
                $('.delete-form').attr('action', 'games/' + id);
                $('.delete-form').submit();
            });
            $('#btn-no').on('click', () => {
                $('.modal').removeClass('active');
            });
        });

        $('.qsearch').on('keyup', function (e) {
            e.preventDefault();
            var query = $(this).val();
            var token = $('input[name=_token]').val();
            var model = 'games';

            $.post(model + '/search', {
                q: query,
                _token: token
            },
                function (data) {
                    $('.module-info-resources').html(data);
                }
            ).fail(function (jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud: ' + textStatus, errorThrown);
            });
        });
    });
</script>
@endsection