<div class="flex items-center justify-between">

    <p class="text-sm text-gray-600">
        {{ trans_choice(':count result | :count results', $paginator->total(), ['count' => $paginator->total()]) }}
    </p>

    @if ($paginator->hasPages())

        <nav class="flex overflow-hidden bg-white border border-gray-200 divide-x divide-gray-200 rounded-lg shadow-sm">

            @if ($paginator->onFirstPage())
                <span class="p-2 text-sm text-gray-300">
                    <x-heroicon-s-chevron-left class="w-5 h-5" />
                </span>
            @else
                <a class="p-2 text-sm text-gray-500 transition duration-150 ease-in-out hover:text-gray-400 focus:bg-gray-50"
                    href="{{ $paginator->previousPageUrl() }}">
                    <x-heroicon-s-chevron-left class="w-5 h-5" />
                </a>
            @endif

            @if (!$paginator->hasMorePages())
                <span class="p-2 text-sm text-gray-300">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </span>
            @else
                <a class="p-2 text-sm text-gray-500 transition duration-150 ease-in-out hover:text-gray-400 focus:bg-gray-50"
                    href="{{ $paginator->nextPageUrl() }}">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </a>
            @endif

        </nav>

    @endif
</div>
