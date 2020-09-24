@props(['field', 'item'])

<div class="w-4 h-4 bg-current rounded" style="color: {{ Arr::get($item, $field->getName()) ?? $field->getValue() }}">
</div>
