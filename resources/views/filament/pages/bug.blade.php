<x-filament::page>
    {{$this->main}}

    <button
        class="p-2 border"
        x-data
        x-on:click="$dispatch('open-modal', { id: 'simpleUpdate' })"
        positive

    >Add simple model
    </button>

    <div>
        <x-filament::modal
            width="4xl"
            id="simpleView"

        >
            <x-slot name="trigger">
                <button type="button"
                        class="p-2 border"

                        x-on:click="isOpen = true">Open</button>
            </x-slot>
            <ul>
                @foreach(\App\Models\SimpleModel::all() as $sm)
                    <li class="p-1 border rounded cursor-pointer"     wire:click="updateSimpleModel('{{$sm->id}}')">Item
                        {{$sm->id}} edit</li>
                @endforeach


            </ul>

        </x-filament::modal>
    </div>


    <div>
        <x-filament::modal
            id="simpleUpdate"
            width="4xl"

        >

            <div >
                {{$this->bug}}
            </div>

            <x-slot name="actions">
                <div class="flex justify-right" wire:click="saveSpecialDate">

                </div>
            </x-slot>

            <button wire:click="render">Render</button>
        </x-filament::modal>
    </div>
</x-filament::page>
