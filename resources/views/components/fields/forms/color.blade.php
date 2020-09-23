@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    <div class="space-y-2">

        <div class="flex flex-wrap gap-2">
            @foreach ($field->getColors() as $color)
                <input
                    {{ (old($field->getName()) ?? (Arr::get($item, $field->getName()) ?? $field->getValue())) === $color ? 'checked' : '' }}
                    {{ $field->getRequired() ? 'required' : '' }} name="{{ $field->getName() }}"
                    id="{{ $field->getName() }}" type="radio" class="w-8 h-8 bg-current form-checkbox"
                    value="{{ $color }}" style="color: {{ $color }}" />
            @endforeach
        </div>

        <x-nebula::error :for="$field->getName()" />

    </div>

</x-nebula::form-row>
