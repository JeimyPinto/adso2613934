@if ($paginator->hasPages())
    <nav class="navigate-paginate">
        <ul class="pagination">
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <img src="images/ico-arrow-prev.svg" alt="  ">
                </a>
            </li>
            {{-- Current Page Indicator --}}
            <li class="disabled" aria-disabled="true">
                <span>{{ sprintf('%02d/%02d', $paginator->currentPage(), $paginator->lastPage()) }}</span>
            </li>
            <li class="disabled" aria-disabled="true">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src="images/ico-arrow-next.svg" alt=" ">
                </a>
            </li>
        </ul>
    </nav>
@endif
