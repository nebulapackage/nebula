<div class="flex items-center justify-between">

    @if ($paginator->hasPages())


        @if ($paginator->onFirstPage())
            <span class="p-2 text-gray-300">
                <x-heroicon-s-chevron-left class="w-5 h-5" />
            </span>
        @else
            <a class="p-2 text-gray-500 transition duration-150 ease-in-out rounded-lg hover:text-gray-400 focus:bg-gray-100"
                href="{{ $paginator->previousPageUrl() }}">
                <x-heroicon-s-chevron-left class="w-5 h-5" />
            </a>
        @endif

        <p class="text-sm text-gray-600">
            {{ trans_choice(':count result | :count results', $paginator->total(), ['count' => $paginator->total()]) }}
        </p>

        @if (!$paginator->hasMorePages())
            <span class="p-2 text-gray-300 bg-white">
                <x-heroicon-s-chevron-right class="w-5 h-5" />
            </span>
        @else
            <a class="p-2 text-gray-500 transition duration-150 ease-in-out rounded-lg hover:text-gray-400 focus:bg-gray-100"
                href="{{ $paginator->nextPageUrl() }}">
                <x-heroicon-s-chevron-right class="w-5 h-5" />
            </a>
        @endif


    @endif
</div>
