@props(['field', 'item' => null])

@php
dd(Address::all())
@endphp

<x-nebula::form-row :field="$field">

    <p class="text-sm">
        {{ $item->{$field->getRelation()}->{$field->getDisplays()} ?? $field->getValue() }}
    </p>

</x-nebula::form-row>
