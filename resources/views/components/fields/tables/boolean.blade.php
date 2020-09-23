@props(['field', 'item' => null])

@if (Arr::get($item, $field->getName()) ?? $field->getValue())
    <span class="inline-block px-3 py-1 font-mono text-sm font-medium rounded-full bg-success-100 text-success-600">
        True
    </span>
@else
    <span class="inline-block px-3 py-1 font-mono text-sm font-medium rounded-full bg-danger-100 text-danger-600">
        False
    </span>
@endif
