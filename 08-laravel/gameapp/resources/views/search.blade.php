@foreach ($categories as $category)
    @if(count($category->$game) > 0)
        <section class="categorie-section">
            <div class="categorie-section-title">
                <img src="{{ asset('images/slide01.png') }}" alt="categorie-image" id="categorie-section-title-image">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="game-carousel">
                @foreach ($games as $game)
                    @if ($game->category_id == $category->id)
                        <div class="game-section">
                            <a href="{{ url('catalogue/' . $game->id) }}" class="categorie-item">
                                <img src="{{ asset('/images/games/' . $game->image) }}" alt="" class="game-section-img">
                                <span class="game-section-span">{{ $game->title }}</s>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="prev">
                <img src="{{ asset('images/btn-prev.svg') }}" alt="">
            </button>
            <button class="next">
                <img src="{{ asset('images/btn-next.svg') }}" alt="">
            </button>
        </section>
    @endif
@endforeach