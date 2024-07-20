<div>

    @livewire('hijo')


<x-button wire:click="$set('numberLetterName', 0)">
            resetear
        </x-button>
    <h2 class="mb-4">
        Numero de letras del nombre: {{$numberLetterName}}
    </h2>
    <form wire:submit="AddUserName" class="mb-4">
        <x-input wire:model="user"
        wire:keydown.Shift="numberLettersMethod"/>
        <x-button>
            Guardar
        </x-button>
    </form>
    <ul class="space-y-3">
        @foreach($users as $index=>$user)
            <li wire:key="user-{{$index}}" class="mb-4">
                <span wire:mouseenter="UserSelect('{{$user}}')">
                    {{$user}}
                </span>
                    <x-danger-button wire:click="DeletUser({{$index}})">
                        x
                    </x-danger-button>
                    
            </li>
        @endforeach

        <x-button wire:click="$toggle('show')">
            Mostrar
        </x-button>
        
        @if ($show)
            <div class="mt-4">
                <h2 >
                    Informacion
                </h2>
                <h3>
                    Usuario Seleccionado: {{$userSelected}}
                <br>
                    Numero de Usuarios: {{$numberUsers}}
                </h3>
        </div>
        @endif

        
    </ul>

    

</div>
