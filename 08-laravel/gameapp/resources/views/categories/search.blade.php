@forelse ($categories as $category)
    <section class="module-info-resources">
        <article class="module-info-resources-article">
            <img src={{ asset('images/' . $category->image) }} class="module-info-resources-article-img" alt="">
            <div class="article-info-user">
                <span>{{ $category->name }}</span>
                <span>{{ $category->description }}</span>
            </div>
            <div class="btns-crud">
                <a href="{{ url('category/' . $category->id) }}">
                    <img src="images/ico-details.svg" alt="" id="module-info-resources-article-details">
                </a>
                <a href="{{ url('category/' . $category->id . '/edit') }}">
                    <img src="images/ico-edit.svg" alt="" id="module-info-resources-article-edit">
                </a>
                <button type="button" class="btn-delete" data-toggle="modal" data-target="#deleteModal"
                    data-id="{{ $category->id }}">
                    <img src="images/ico-delete.svg" alt="" id="module-info-resources-article-delete">
                </button>
                <form action="{{ url('category/' . $category->id) }}" method="post" class="delete-form">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </article>
    </section>
@empty
    No found 🪐
@endforelse
