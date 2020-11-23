@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <p class="text-sm">{{ $field->resolveHasOne() }}</p>

</x-nebula::form-row>
