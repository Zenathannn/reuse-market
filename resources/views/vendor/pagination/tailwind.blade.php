@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
    <div class="flex items-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <button disabled class="px-4 py-2 bg-white text-gray-400 font-bold rounded-lg cursor-not-allowed">
            <i class="fas fa-chevron-left"></i>
        </button>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold rounded-lg shadow-lg transition">
            <i class="fas fa-chevron-left"></i>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <button disabled class="px-4 py-2 bg-white text-gray-400 font-bold rounded-lg cursor-not-allowed">
            {{ $element }}
        </button>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        {{-- "First" Page Link --}}
        @if ($page == 1)
        @if ($paginator->currentPage() == 1)
        <button disabled class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-lg shadow-lg">{{ $page }}</button>
        @else
        <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">{{ $page }}</a>
        @endif
        @endif

        {{-- "Last" Page Link --}}
        @if ($page == $paginator->lastPage())
        @if ($paginator->currentPage() == $paginator->lastPage())
        <button disabled class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-lg shadow-lg">{{ $page }}</button>
        @else
        <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">{{ $page }}</a>
        @endif
        @endif

        {{-- "Middle" Links --}}
        @if ($page > 1 && $page < $paginator->lastPage())
            @if ($page >= $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1)
                @if ($paginator->currentPage() == $page)
                <button disabled class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-lg shadow-lg">{{ $page }}</button>
                @else
                <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-green-50 hover:border-green-500 hover:text-green-600 transition">{{ $page }}</a>
                @endif
                @endif
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold rounded-lg shadow-lg transition">
                    <i class="fas fa-chevron-right"></i>
                </a>
                @else
                <button disabled class="px-4 py-2 bg-white text-gray-400 font-bold rounded-lg cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </button>
                @endif
    </div>
</nav>
@endif