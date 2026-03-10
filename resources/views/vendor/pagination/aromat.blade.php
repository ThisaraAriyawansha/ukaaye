@if ($paginator->hasPages())
<ul>
    {{-- Previous --}}
    <li class="custom">
        @if ($paginator->onFirstPage())
            <a class="muted3-color pagination-disabled" style="opacity:.35;pointer-events:none;cursor:default;filter:grayscale(1);"><i class="fas fa-chevron-left"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="muted3-color"><i class="fas fa-chevron-left"></i></a>
        @endif
    </li>

    {{-- Page Numbers --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="dot"><span></span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a href="{{ $url }}" class="page-numbers current">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                @else
                    <li><a href="{{ $url }}" class="page-numbers">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    <li class="custom st-2">
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="muted3-color"><i class="fas fa-chevron-right"></i></a>
        @else
            <a class="muted3-color pagination-disabled" style="opacity:.35;pointer-events:none;cursor:default;filter:grayscale(1);"><i class="fas fa-chevron-right"></i></a>
        @endif
    </li>
</ul>
@endif
