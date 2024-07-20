<div>
    <div>
        <form class="mb-4" wire:submit="save">

            <x-input 
            wire:model="pais"
            
            placeholder="Ingresa un país"
            wire:keydown="Increment"
            />
            <x-button>
                Agregar
            </x-button>
        </form>
    </div>


   <ul class="list-disc list-inside space-y-4">
         @foreach($paises as $index => $pais)
              <li wire:key="pais-{{$index}}">
                    <span wire:mouseenter="showActive('{{$pais}}')">
                    ({{$index}})   {{ $pais }}
                    </span>
                <x-danger-button wire:click="delete({{$index}})">
                    x
                </x-danger-button>
              </li>
         @endforeach
         {{$active}}
         {{$count}}
   </ul>
</div>
