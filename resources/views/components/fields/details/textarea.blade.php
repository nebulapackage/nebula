@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <div x-data="{ expanded: false }">

        <p x-show.transition.opacity="expanded" class="mb-2 text-sm">
            {{ Arr::get($item, $field->getName()) ?? $field->getValue() }}
        </p>

        <button x-on:click="expanded = !expanded"
            class="text-sm font-medium duration-150 ease-in-out text-primary-600 focus:outline-none focus:text-primary-700 hover:text-primary-500">
            <span x-show="!expanded">
                {{ __('Expand :field', ['field' => $field->getlabel()]) }}
            </span>
            <span x-show="expanded">
                {{ __('Collapse :field', ['field' => $field->getlabel()]) }}
            </span>
        </button>

    </div>

</x-nebula::form-row>