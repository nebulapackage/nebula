<h2 class="text-base font-medium font-display">
    {{ __('Last month') }}
</h2>

<div class="grid grid-cols-12 gap-6">

    @foreach ($dashboard->metrics() as $metric)
        <x-dynamic-component :component="$metric->component()" :metric="$metric" />
    @endforeach

</div>
