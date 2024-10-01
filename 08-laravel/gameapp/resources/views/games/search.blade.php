@forelse($games as $game)
    <article class="module-info-resources-article">
        <img src={{ asset('images/games/' . $game->image) }} class="module-info-resources-article-img" alt="">
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
@empty
    No found 🪐
@endforelse