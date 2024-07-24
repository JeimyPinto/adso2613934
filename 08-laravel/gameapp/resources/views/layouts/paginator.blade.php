@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <span>@lang('pagination.previous')</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <img src="images/ico-arrow-prev.svg" alt="  ">
                    </a>
                </li>
            @endif
            {{-- Current Page Indicator --}}
            <li class="disabled" aria-disabled="true">
                <span>{{ sprintf('%02d/%02d', $paginator->currentPage(), $paginator->lastPage()) }}</span>
            </li>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <img src="images/ico-arrow-next.svg" alt="  ">
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span>@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
