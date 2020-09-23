@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <div class="w-8 h-8 bg-current rounded"
        style="color: {{ Arr::get($item, $field->getName()) ?? $field->getValue() }}"></div>

</x-nebula::form-row>