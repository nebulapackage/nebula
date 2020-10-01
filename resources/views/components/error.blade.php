@props(['for'])

@error($for->getName())
<p class="text-sm font-medium text-danger-600">{{ $message }}</p>
@enderror
