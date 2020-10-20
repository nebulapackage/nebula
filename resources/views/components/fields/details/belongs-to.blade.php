@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <p class="text-sm">{{ $field->resolveBelongsTo($item) }}</p>

</x-nebula::form-row>
