@props(['method' => 'POST', 'action' => ''])

<form action="{{ $action }}" method="{{ $method !== 'GET' ? 'POST' : 'GET' }}">
    {{ $slot }}
    @csrf
    @method($method)
</form>
