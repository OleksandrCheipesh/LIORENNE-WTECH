@if ($paginator->hasPages())
<nav class="liorenne-pagination" aria-label="Pagination">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="pag-btn pag-btn--disabled">&larr;</span>
    @else
        <a class="pag-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr;</a>
    @endif

    {{-- Page numbers --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="pag-btn pag-btn--dots">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="pag-btn pag-btn--active">{{ $page }}</span>
                @else
                    <a class="pag-btn" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a class="pag-btn" href="{{ $paginator->nextPageUrl() }}" rel="next">&rarr;</a>
    @else
        <span class="pag-btn pag-btn--disabled">&rarr;</span>
    @endif

</nav>
@endif
