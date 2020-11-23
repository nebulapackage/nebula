@props(['resource', 'items'])

<x-nebula::card>

    <div class="overflow-x-auto ">
        <table class="w-full text-left table-auto">
            <thead>
                <tr>

                    @foreach ($resource->indexFields() as $field)
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase bg-gray-50">
                            {{ $field->getLabel() }}
                        </th>
                    @endforeach

                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr>

                        @foreach ($resource->indexFields() as $field)
                            <td class="p-4 text-sm border-t border-gray-200">
                                <a href="{{ route('nebula.resources.show', [$resource->name(), $item]) }}">
                                    <x-dynamic-component :item="$item" :component="$field->getTableComponent()"
                                        :field="$field" />
                                </a>
                            </td>
                        @endforeach

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <footer class="px-4 py-2">
        {{ $items->withQueryString()->links('nebula::components.pagination') }}
    </footer>

</x-nebula::card>
