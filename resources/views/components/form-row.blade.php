<div class="grid md:grid-cols-3">

    <div class="px-6 py-3">

        <x-nebula::label :for="$field->getName()">
            {{ $field->getLabel() }}
        </x-nebula::label>

    </div>

    <div class="px-6 py-3 -mt-5 sm:mt-0 md:col-span-2">
        {{ $slot }}
    </div>

</div>
