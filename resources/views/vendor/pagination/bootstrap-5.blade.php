@if ($paginator->hasPages())
    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
        <div class="pagination d-flex justify-content-center mt-5">
            @if ($paginator->onFirstPage())
                <a href="#" class="rounded">&laquo;</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="rounded" rel="prev">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="rounded" rel="next">@lang('pagination.next')</a>
            @else
                <a href="#" class="rounded">@lang('pagination.next')</a>
            @endif
        </div>
    </div>
@endif