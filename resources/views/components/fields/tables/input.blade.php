@props(['field', 'item'])

{{ Arr::get($item, $field->getName()) }}
