@props(['field'])

<x-nebula::form-row :field="$field">

    <input type="hidden" value="0" name="{{ $field->getName() }}">

    <div class="space-y-2">

        <input class="block border border-gray-300 shadow-sm form-checkbox" id="{{ $field->getName() }}" value="1"
            {{ old($field->getName()) ?? $field->getValue() ? 'checked' : '' }} name="{{ $field->getName() }}"
            type="checkbox">

        <x-nebula::error :for="$field->getName()" />

    </div>

</x-nebula::form-row>
