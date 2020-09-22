@props(['field'])

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{ array_search($field->getValue(), $field->getOptions()) }}
    </p>

</x-nebula::form-row>
