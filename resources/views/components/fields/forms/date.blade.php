@props(['field'])

<x-nebula::form-row :field="$field">

    <div class="space-y-2">

        <input class="block w-full max-w-lg border border-gray-300 rounded-lg shadow-sm form-input sm:text-sm"
            id="{{ $field->getName() }}" value="{{ old($field->getName()) ?? $field->getHTMLDatePickerFormatValue() }}"
            {{ $field->getRequired() ? 'required' : '' }} name="{{ $field->getName() }}" type="date">

        <x-nebula::error :for="$field->getName()" />

    </div>

</x-nebula::form-row>
