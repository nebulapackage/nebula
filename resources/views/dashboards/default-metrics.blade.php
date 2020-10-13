<div class="grid grid-cols-12 gap-6">

    @foreach ($dashboard->metrics() as $metric)
        <x-dynamic-component :component="$metric->component()" :metric="$metric" />
    @endforeach

</div>
