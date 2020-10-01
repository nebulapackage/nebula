@props(['for'])

@if($for->getHelperText())
<p class="text-sm font-medium text-gray-600">{{ $for->getHelperText() }}</p>
@enderror
