@props(['field', 'item' => null])

<div class="p-4 bg-gray-100">
    <h3 class="mb-4 text-base font-medium">{{ $field->getLabel() }}</h3>

    <x-nebula::table :resource="$field->getResource()" :items="$field->resolveHasMany($item)" />
</div>
