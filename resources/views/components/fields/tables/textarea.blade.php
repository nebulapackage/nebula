@props(['field', 'item'])

{{ Str::limit(Arr::get($item, $field->getName()), 24, '...') }}