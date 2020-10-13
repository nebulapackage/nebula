<x-nebula::layouts.shell :title="__(':Dashboard dashboard', ['dashboard' => $dashboard->singularName()])">

    <div class="mb-8 space-y-4">
        {{ $dashboard->display() }}
    </div>

</x-nebula::layouts.shell>
