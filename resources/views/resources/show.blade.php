<x-nebula::layouts.shell :title="__(':Resource details', ['resource' => $resource->singularName()])"
    :back="route('nebula.resources.index', $resource->name())">

    <x-slot name="actions">

        <x-nebula::form :action="route('nebula.resources.destroy', [$resource->name(), $item])" method="DELETE">

            <div x-data="{ confirmed: false }">

                <button x-on:click.away="confirmed = false" x-bind:type="!confirmed ? 'button' : 'submit'"
                    x-on:click="confirmed = true" class="button button-secondary">
                    <span x-show.transition.in="!confirmed">
                        {{ __('Delete :resource', ['resource' => $resource->singularName()]) }}
                    </span>
                    <span x-show.transition.in="confirmed">
                        {{ __('Are you sure?') }}
                    </span>
                </button>

            </div>

        </x-nebula::form>

        <a href="{{ route('nebula.resources.edit', [$resource->name(), $item]) }}" class="button button-secondary">
            {{ __('Edit :resource', ['resource' => $resource->singularName()]) }}
        </a>

    </x-slot>

    <div class="-mx-4 sm:mx-0">
        <x-nebula::card>

            <x-slot name="title">
                {{ __(':Resource details', ['resource' => $resource->pluralName()]) }}
            </x-slot>

            @foreach ($resource->fields() as $field)
                <x-dynamic-component :item="$item" :component="$field->getDetailsComponent()" :field="$field" />
            @endforeach

        </x-nebula::card>
    </div>

</x-nebula::layouts.shell>
