@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{ array_search(Arr::get($item, $field->getName()) ?? $field->getValue(), $field->getOptions()) }}
    </p>

</x-nebula::form-row>
