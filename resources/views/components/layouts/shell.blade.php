@props(['title' => config('nebula.name'), 'actions' => null, 'contextMenu' => null, 'back' => false])

<x-nebula::layouts.app>

    <div class="flex flex-col min-h-screen lg:flex-row">

        <aside x-data="{ menuOpen: false }" class="flex flex-col text-white bg-gray-900 lg:hidden">

            <header class="flex items-center justify-between h-16 px-4">
                <div>
                    <p class="w-full text-base font-medium truncate font-display">{{ config('nebula.name') }}</p>
                </div>

                <button x-on:click="menuOpen = !menuOpen"
                    class="flex items-center justify-center w-10 h-10 bg-gray-800 rounded-lg">
                    <x-heroicon-s-menu class="w-6 h-6 text-gray-400" />
                </button>
            </header>

            <nav x-show.transition.opacity="menuOpen" class="border-t border-gray-700">
                @if ($dashboards = config('nebula.dashboards'))
                    <ul class="px-2 my-4 space-y-1">

                        <li>
                            <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                                {{ __('Dashboards') }}
                            </p>
                        </li>

                        @foreach ($dashboards as $dashboard)
                            <li>

                                <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                                    href="{{ route('nebula.dashboards.index', $dashboard->name()) }}">
                                    {{ svg("heroicon-o-{$dashboard->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                                    {{ $dashboard->pluralName() }}
                                </a>

                            </li>
                        @endforeach

                    </ul>
                @endif

                <ul class="px-2 my-4 space-y-1">

                    <li>
                        <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                            {{ __('Resources') }}
                        </p>
                    </li>

                    @foreach (config('nebula.resources') as $resource)
                        <li>
                            <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                                href="{{ route('nebula.resources.index', $resource->name()) }}">
                                {{ svg("heroicon-o-{$resource->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                                {{ $resource->pluralName() }}
                            </a>
                        </li>
                    @endforeach

                </ul>

                @if($pages = config('nebula.pages'))
                    <ul class="px-2 my-4 space-y-1">

                        <li>
                            <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                                {{ __('Pages') }}
                            </p>
                        </li>

                        @foreach ($pages as $page)
                            <li>
                                <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                                    href="{{ route('nebula.pages.index', $page->name()) }}">
                                    {{ svg("heroicon-o-{$page->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                                    {{ $page->name() }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </nav>
        </aside>

        <aside class="sticky inset-y-0 top-0 flex-col hidden w-64 h-screen text-white bg-gray-900 lg:flex">

            <header class="flex flex-col items-start justify-center h-16 px-4 border-b border-gray-700">
                <p class="w-full text-base font-medium truncate font-display">{{ config('nebula.name') }}</p>
            </header>

            @if ($dashboards = config('nebula.dashboards'))
                <ul class="px-2 my-4 space-y-1">

                    <li>
                        <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                            {{ __('Dashboards') }}
                        </p>
                    </li>

                    @foreach ($dashboards as $dashboard)
                        <li>

                            <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                                href="{{ route('nebula.dashboards.index', $dashboard->name()) }}">
                                {{ svg("heroicon-o-{$dashboard->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                                {{ $dashboard->pluralName() }}
                            </a>

                        </li>
                    @endforeach

                </ul>
            @endif

            <ul class="px-2 my-4 space-y-1">

                <li>
                    <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                        {{ __('Resources') }}
                    </p>
                </li>

                @foreach (config('nebula.resources') as $resource)
                    <li>
                        <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                            href="{{ route('nebula.resources.index', $resource->name()) }}">
                            {{ svg("heroicon-o-{$resource->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                            {{ $resource->pluralName() }}
                        </a>
                    </li>
                @endforeach

            </ul>

            @if ($pages = config('nebula.pages'))
            <ul class="px-2 my-4 space-y-1">

                <li>
                    <p class="flex items-center h-8 px-2 text-xs font-medium text-gray-300 uppercase">
                        {{ __('Pages') }}
                    </p>
                </li>

                @foreach ($pages as $page)
                    <li>

                        <a class="flex items-center h-10 px-2 text-sm font-medium text-gray-300 capitalize rounded-lg"
                            href="{{ route('nebula.pages.index', $page->slug()) }}">
                            {{ svg("heroicon-o-{$page->icon()}", ['class' => 'w-5 h-5 mr-2 text-gray-400']) }}
                            {{ $page->name() }}
                        </a>

                    </li>
                @endforeach

            </ul>
        @endif

        </aside>

        <main class="z-10 flex-1 overflow-hidden bg-gray-100 shadow lg:rounded-l-lg">

            <header class="px-4 bg-white shadow sm:px-8">

                <div class="grid items-center justify-between gap-4 py-4 lg:h-16 sm:flex">

                    <div class="flex items-center space-x-4">

                        @if ($back)
                            <a class="icon-button" href="{{ $back }}">
                                <x-heroicon-o-arrow-left class="w-6 h-6" />
                            </a>
                        @endif

                        <h1 class="text-xl font-medium tracking-tight font-display">
                            {{ $title }}
                        </h1>

                    </div>

                    @if ($actions)
                        <nav class="flex items-center space-x-4">
                            {{ $actions }}
                        </nav>
                    @endif

                </div>

            </header>

            @if ($contextMenu)

                <div class="z-10 px-4 bg-white shadow sm:px-8">

                    <div class="border-t border-gray-200">
                        {{ $contextMenu }}
                    </div>

                </div>

            @endif

            <section class="py-8">

                <x-nebula::container>
                    {{ $slot }}
                </x-nebula::container>

            </section>

        </main>

    </div>

</x-nebula::layouts.app>
