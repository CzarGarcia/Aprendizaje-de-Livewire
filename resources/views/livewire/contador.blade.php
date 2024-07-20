<div>

    <x-button wire:click="decrement">
        -
    </x-button>
    
    <span class="mx-11">
        {{$count}}
    </span>

    <x-button wire:click="increment(4)">
        +
    </x-button>

</div>
