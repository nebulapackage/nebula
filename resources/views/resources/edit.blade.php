<x-nebula::layouts.shell :title="__('Edit :resource', ['resource' => $resource->singularName()])"
    :back="route('nebula.resources.show', [$resource->name(), $item])">

    <x-nebula::form :action="route('nebula.resources.update', [$resource->name(), $item])" method="PATCH">

        <div class="-mx-4 sm:mx-0">
            <x-nebula::card>

                <x-slot name="title">
                    {{ __('Edit :resource', ['resource' => $resource->singularName()]) }}
                </x-slot>

                @foreach ($resource->editFields() as $field)
                    <x-dynamic-component :item="$item" :component="$field->getFormComponent()" :field="$field" />
                @endforeach

                <x-nebula::form-actions>

                    <a href="{{ route('nebula.resources.index', $resource->name()) }}" type="button"
                        class="button button-secondary">
                        {{ __('Back to :resources', ['resources' => $resource->pluralName()]) }}
                    </a>

                    <button type="submit" class="button button-primary">
                        {{ __('Update :resource', ['resource' => $resource->singularName()]) }}
                    </button>

                </x-nebula::form-actions>

            </x-nebula::card>
        </div>

    </x-nebula::form>

</x-nebula::layouts.shell>
