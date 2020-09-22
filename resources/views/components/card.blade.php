@props(['title' => false])

<div class="overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow">

    @if ($title)
        <header class="px-6 py-4">

            <h2 class="text-lg font-medium font-display">
                {{ $title }}
            </h2>

        </header>
    @endif

    {{ $slot }}
</div>
