@props(['field'])

<x-nebula::form-row :field="$field">

    <div class="w-8 h-8 bg-current rounded" style="color: {{ $field->getValue() }}"></div>

</x-nebula::form-row>
