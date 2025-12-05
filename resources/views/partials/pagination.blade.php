@if ($paginator->hasPages())
<nav class="my-2 text-center flex flex-col sm:flex-row items-center justify-center gap-2">
    <div class="join mb-2 sm:mb-0">
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
        <button disabled class="btn join-item btn-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">»</button>
        @endif
    </div>

    {{-- Posts per page selector --}}
    <form method="GET" class="flex items-center gap-2">
        <label for="perPage" class="font-medium w-36 text-right">Posts per page:</label>
        <select name="perPage" id="perPage" class="select select-bordered" onchange="this.form.submit()">
            @foreach([5, 10, 20, 50, 100] as $size)
            <option value="{{ $size }}" {{ request()->query('perPage', 10) == $size ? 'selected' : '' }}>
                {{ $size }}
            </option>
            @endforeach
        </select>
    </form>

</nav>
@endif