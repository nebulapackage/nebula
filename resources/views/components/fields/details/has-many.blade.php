@props(['field', 'item' => null])

<x-nebula::nested-form-row :field="$field">

    @foreach ($item->{$field->getRelation()} as $subitem)
        <div class="bg-white divide-y divide-gray-200 rounded-lg shadow">
            @foreach ($field->getFields() as $subfield)
                <x-dynamic-component :component="$subfield->getDetailsComponent()" :field="$subfield"
                    :item="$subitem" />
            @endforeach
        </div>
    @endforeach

</x-nebula::nested-form-row>
