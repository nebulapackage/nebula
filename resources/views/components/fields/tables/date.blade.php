@props(['field', 'item'])

{{ $field->applyFormat(Arr::get($item, $field->getName()) ?? $field->getValue()) }}
