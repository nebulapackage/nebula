@props(['for' => null])

<label class="text-sm font-medium text-gray-700" for="{{ $for }}">
    {{ $slot }}
</label>
