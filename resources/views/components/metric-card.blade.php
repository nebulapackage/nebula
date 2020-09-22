@props(['colSpan' => 4])

<div class="overflow-hidden p-4 bg-white rounded-lg shadow col-span-{{ $colSpan }}">
    {{ $slot }}
</div>
