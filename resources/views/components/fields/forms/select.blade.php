@props(['field'])

<x-nebula::form-row :field="$field">

    <div class="space-y-2">

        <select class="block w-full max-w-lg border border-gray-300 rounded-lg shadow-sm form-select sm:text-sm"
            id="{{ $field->getName() }}" {{ $field->getRequired() ? 'required' : '' }} name="{{ $field->getName() }}">

            <option value="">Select an option</option>

            @empty(!$field->getOptions())
                @foreach ($field->getOptions() as $key => $value)
                    <option {{ (old($field->getName()) ?? $field->getValue()) == $value ? 'selected' : '' }}
                        value="{{ $value }}">
                        {{ $key }}
                    </option>
                @endforeach
            @endempty

        </select>

        <x-nebula::error :for="$field->getName()" />

    </div>

</x-nebula::form-row>
