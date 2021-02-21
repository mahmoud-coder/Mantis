@if ($paginator->hasPages())
    <nav class="all-products-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </div>
            @else
                <div class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </div>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                <div>
            @else
                <div class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.next')</span>
                </div>
            @endif
    </nav>
@endif
