<header class="px-6 py-4">

    <h2 class="text-lg font-medium font-display">
        {{ $field->getLabel() }}
    </h2>

</header>

<div class="p-2 space-y-2 bg-gray-50">
    {{ $slot }}
</div>
