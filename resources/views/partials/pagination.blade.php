@if ($paginator->hasPages())
    <nav class="my-2 text-center">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button disabled class="btn join-item btn-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" aria-hidden="true">«</button>
            @else
                <a class="btn join-item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button disabled class="btn join-item btn-disabled" aria-disabled="true"><span>{{ $element }}</span></button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="btn join-item btn-active" aria-current="page"><span>{{ $page }}</span></button>
                        @else
                            <a class="btn join-item" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                    <a class="btn join-item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">»</a>

            @else
                <button disabled class="btn join-item btn-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">»</span>
                </button>
            @endif
        </div>
    </nav>
@endif
