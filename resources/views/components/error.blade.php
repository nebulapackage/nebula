@props(['for'])

@error($for)
<p class="text-sm font-medium text-danger-600">{{ $message }}</p>
@enderror
