@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <div class="space-y-2">

        <input class="block w-full max-w-lg border border-gray-300 rounded-lg shadow-sm form-input sm:text-sm"
            placeholder="{{ $field->getPlaceholder() }}" id="{{ $field->getName() }}"
            value="{{ old($field->getName()) ?? (Arr::get($item, $field->getName()) ?? $field->getValue()) }}"
            {{ $field->getRequired() ? 'required' : '' }} name="{{ $field->getName() }}" type="{{ $field->getType() }}">

        <x-nebula::error :for="$field->getName()" />

    </div>

</x-nebula::form-row>
