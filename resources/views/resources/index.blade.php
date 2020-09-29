<x-nebula::layouts.shell :title="__(':Resources overview', ['resources' => $resource->pluralName()])">

    <x-slot name="actions">

        <a href="{{ route('nebula.resources.create', $resource->name()) }}" class="button button-primary">
            {{ __('Create :resource', ['resource' => $resource->singularName()]) }}
        </a>

    </x-slot>

    <x-slot name="contextMenu">

        <form class="grid items-center gap-4 py-4 lg:flex" method="GET">

            <input name="search" value="{{ $activeSearch }}" type="text" placeholder="{{ __('Search anything...') }}"
                class="w-full max-w-md text-sm placeholder-gray-500 border-gray-300 rounded-lg shadow-sm form-input">

            <select name="filter" class="text-sm placeholder-gray-500 border-gray-300 rounded-lg shadow-sm form-select">

                <option value="" selected>
                    {{ __('Select filter') }}
                </option>

                @foreach ($resource->filters() as $filter)
                    <option {{ $activeFilter && $activeFilter === $filter->name() ? 'selected' : '' }}
                        value="{{ $filter->name() }}">{{ $filter->label() }}</option>
                @endforeach
            </select>

            <button type="submit" class="button button-secondary">
                {{ __('Apply filters') }}
            </button>

            @if ($activeSearch || $activeFilter)
                <a class="text-sm text-center text-gray-600"
                    href="{{ route('nebula.resources.index', $resource->name()) }}">
                    {{ __('Remove filters') }}
                </a>
            @endif

        </form>

    </x-slot>

    @empty(! $metrics = $resource->metrics())
        <div class="mb-8 space-y-4">

            <h2 class="text-base font-medium font-display">
                {{ __('Last month') }}
            </h2>

            <div class="grid grid-cols-12 gap-6">

                @foreach ($metrics as $metric)
                    <x-dynamic-component :component="$metric->component()" :metric="$metric" />
                @endforeach

            </div>

        </div>
    @endempty

    @empty($items->count())
        <div class="flex flex-col items-center justify-center px-6 py-8 text-center">

            <x-heroicon-o-information-circle class="w-16 h-16 text-gray-400" />

            <h2 class="mt-2 text-base font-medium">
                {{ __('No :resources found', ['resources' => $resource->pluralName()]) }}
            </h2>

            <p class="max-w-md mt-1 text-sm text-gray-600">
                {{ __(':Resources you\'ve created will show up here.', ['resources' => $resource->pluralName()]) }}
            </p>

            <footer class="mt-4 space-x-4">

                <a class="button button-primary" href="{{ route('nebula.resources.create', $resource->name()) }}">
                    {{ __('Create :resource', ['resource' => $resource->singularName()]) }}
                </a>

            </footer>

        </div>
    @else
        <div class="-mx-4 sm:mx-0">
            <x-nebula::card>

                <div class="overflow-x-auto ">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr>

                                @foreach ($resource->indexFields() as $field)
                                    <th
                                        class="px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase bg-gray-50">
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
                                            <a href="{{ route('nebula.resources.show', [$resource->name(), $item->id]) }}">
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
        </div>
    @endisset

</x-nebula::layouts.shell>
