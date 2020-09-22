<x-nebula::layouts.shell :title="__('Get started')">

    <div class="space-y-8">

        <header>

            <h1 class="text-2xl font-medium font-display">
                {{ __('Get started') }}
            </h1>

            <p class="mt-1 text-gray-600">
                {{ __('Welcome to Nebula, let\'s get that data working!') }}
            </p>

        </header>

        <div class="grid grid-cols-2 gap-px overflow-hidden bg-gray-200 rounded-lg shadow">

            <article class="flex p-6 space-x-6 bg-white">

                <div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-50">
                        <x-heroicon-o-cube class="w-8 h-8 text-primary-700" />
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-medium font-display">
                        {{ __('Resources') }}
                    </h2>
                    <p class="text-sm text-gray-600">
                        {{ __('Resources are a key part of Nebula, they easily allow you to scaffold CRUD interfaces through a CLI.') }}
                    </p>
                </div>

            </article>

            <article class="flex p-6 space-x-6 bg-white">

                <div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-50">
                        <x-heroicon-o-search class="w-8 h-8 text-primary-700" />
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-medium font-display">
                        {{ __('Filters') }}
                    </h2>
                    <p class="text-sm text-gray-600">
                        {{ __('Sometimes you need to search for specific records in tons of data, filters will make your life easier.') }}
                    </p>
                </div>

            </article>

            <article class="flex p-6 space-x-6 bg-white">

                <div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-50">
                        <x-heroicon-o-trending-up class="w-8 h-8 text-primary-700" />
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-medium font-display">
                        {{ __('Metrics') }}
                    </h2>
                    <p class="text-sm text-gray-600">
                        {{ __('Metrics are useful cards which display data of resources, they can be found in dashboards and resources.') }}
                    </p>
                </div>

            </article>

            <article class="flex p-6 space-x-6 bg-white">

                <div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-50">
                        <x-heroicon-o-collection class="w-8 h-8 text-primary-700" />
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-medium font-display">
                        {{ __('Dashboards') }}
                    </h2>
                    <p class="text-sm text-gray-600">
                        {{ __('You can create as many dashboards as you want with all the metrics you need.') }}
                    </p>
                </div>

            </article>

        </div>

    </div>

</x-nebula::layouts.shell>
