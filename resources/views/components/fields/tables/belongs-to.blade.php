@props(['field', 'item' => null])

{{ $item->{$field->getRelation()}->{$field->getDisplays()} ?? $field->getValue() }}
