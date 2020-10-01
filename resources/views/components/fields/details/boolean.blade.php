@props(['field', 'item' => null])

<x-nebula::form-row :field="$field">

    @if (Arr::get($item, $field->getName()) ?? $field->getValue())
        <span class="inline-block px-3 py-1 font-mono text-sm font-medium rounded-full bg-success-100 text-success-600">
            {{ $field->getTrue() }}
        </span>
    @else
        <span class="inline-block px-3 py-1 font-mono text-sm font-medium rounded-full bg-danger-100 text-danger-600">
            {{ $field->getFalse() }}
        </span>
    @endif

</x-nebula::form-row>
