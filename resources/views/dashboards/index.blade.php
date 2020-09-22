<x-nebula::layouts.shell :title="__(':Dashboard dashboard', ['dashboard' => $dashboard->singularName()])">

    <div class="mb-8 space-y-4">

        <h2 class="text-base font-medium font-display">
            {{ __('Last month') }}
        </h2>

        <div class="grid grid-cols-12 gap-6">

            @foreach ($metrics as $metric)
                <x-dynamic-component :component="$metric->component()" :metric="$metric" />
            @endforeach

        </div>

    </div>

</x-nebula::layouts.shell>
