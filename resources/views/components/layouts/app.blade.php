<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('nebula.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="{{ mix('css/app.css', 'vendor/nebula') }}" rel="stylesheet">
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
    @stack('scripts')
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-900">

    {{ $slot }}

    @if ($message = session('toast'))
        <div class="fixed bottom-0 right-0 z-50 w-full max-w-xs m-3 pointer-events-none">

            <div x-show.transition.duration.350ms="isOpen" x-data="{ isOpen: false }"
                x-init="setTimeout(() => isOpen = true, 500)"
                class="flex items-center justify-between p-4 space-x-4 bg-white rounded-lg shadow-xl pointer-events-auto">

                <p class="text-base font-medium font-display">
                    {{ $message }}
                </p>

                <button x-on:click="isOpen = false" class="icon-button">
                    <x-heroicon-o-x class="w-6 h-6"></x-heroicon-o-x>
                </button>

            </div>

        </div>
    @endif

</body>

</html>
