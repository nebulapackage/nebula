@props(['field', 'item'])

{{ array_search(Arr::get($item, $field->getName()) ?? $field->getValue(), $field->getOptions()) }}
