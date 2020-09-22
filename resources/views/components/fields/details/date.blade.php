@props(['field'])

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{ $field->getValue() }}
    </p>

</x-nebula::form-row>
