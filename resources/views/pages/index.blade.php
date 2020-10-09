<x-nebula::layouts.shell :title="$page->singularName()">

    <div class="mb-8 space-y-4">
        {{ $page->display() }}
    </div>

</x-nebula::layouts.shell>
