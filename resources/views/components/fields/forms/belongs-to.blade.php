@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <div class="space-y-2">
        <select class="block w-full max-w-lg border border-gray-300 rounded-lg shadow-sm form-select sm:text-sm"
            id="{{ $field->getName() }}" {{ $field->getRequired() ? 'required' : '' }} name="{{ $field->getName() }}">

            <option value="">Select an option</option>

            @foreach ($field->resolveRelated() as $key => $value)
                <option
                    {{ (old($field->getName()) ?? (Arr::get($item, $field->getName()) ?? $field->getValue())) == $value ? 'selected' : '' }}
                    value="{{ $value }}">
                    {{ $key }}
                </option>
            @endforeach

        </select>

        <x-nebula::error :for="$field" />
        <x-nebula::helper-text :for="$field" />

    </div>

</x-nebula::form-row>
