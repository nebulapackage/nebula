@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{-- TODO: apply format from field --}}
        {{ Arr::get($item, $field->getName()) ?? $field->getValue() }}
    </p>

</x-nebula::form-row>
