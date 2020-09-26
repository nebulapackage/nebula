@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{ $item->{$field->getRelation()}->{$field->getDisplays()} ?? $field->getValue() }}
    </p>

</x-nebula::form-row>
