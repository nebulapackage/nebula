@props(['field', 'item' => null])

@php
$items = $item->{$field->getRelation()}()->paginate($field->getItemsPerPage());
@endphp

<x-nebula::nested-form-row :field="$field">

    @foreach ($items as $item)
        <div class="bg-white divide-y divide-gray-200 rounded-lg shadow">
            @foreach ($field->getFields() as $subfield)
                <x-dynamic-component :component="$subfield->getDetailsComponent()" :field="$subfield" :item="$item" />
            @endforeach
        </div>
    @endforeach

    {{ $items->withQueryString()->links('nebula::components.pagination') }}

</x-nebula::nested-form-row>
