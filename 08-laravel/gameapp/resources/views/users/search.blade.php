@forelse ($users as $user)
    <article class="module-info-resources-article">
        <img src={{ asset('images/profile/' . $user->photo) }} class="module-info-resources-article-img" alt="">
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
@empty
    No found 🪐
@endforelse
