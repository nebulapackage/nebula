@props(['metric'])

<x-nebula::metric-card :col-span="$metric->colSpan()">

    <h3 class="text-sm">
        {{ $metric->label() }}
    </h3>

    <div class="flex items-end justify-between mt-2">

        <div class="flex flex-row items-center space-x-px">
            @if ($prefix = $metric->prefix())
                <p class="text-base text-gray-600">{{ $prefix }}</p>
            @endif

            <h4 class="text-3xl font-medium font-display">
                {{ round($metric->calculate()[0]) }}
            </h4>

            @if ($suffix = $metric->suffix())
                <p class="text-base text-gray-600">{{ $suffix }}</p>
            @endif
        </div>

        @if ($metric->calculateDifference() > 0)
            <div class="inline-flex flex-row items-center h-6 px-2 space-x-1 rounded-full bg-success-100">

                <x-heroicon-s-arrow-up class="w-4 h-4 text-success-600" />

                <span class="text-sm font-medium text-success-900">
                    {{ round($metric->calculateDifference(), 2) }}%
                </span>

            </div>
        @else
            <div class="inline-flex flex-row items-center h-6 px-2 space-x-1 rounded-full bg-danger-100">

                <x-heroicon-s-arrow-down class="w-4 h-4 text-danger-600" />

                <span class="text-sm font-medium text-danger-900">
                    {{ round($metric->calculateDifference(), 2) }}%
                </span>

            </div>
        @endif
    </div>

</x-nebula::metric-card>
