

<div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


<div x-data="{ open: false }">
    <button @click="open = ! open">Toggle</button>
 
    <div x-show="open" @click.outside="open = false">Contents...</div>
</div>

    <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
   <!-- Campos de entrada para el título y el nombre -->
    <x-input wire:model.live="title"  placeholder="Ingrese el título"/>
    <x-input wire:model.live="name" placeholder="Ingrese el nombre"/>

    <!-- Mostrar los valores actuales de las propiedades title y name -->
    <x-label>Título: {{ $title }}</x-label>
    <x-label>Nombre: {{ $name }}</x-label>

    <br><br><br>
    <h3>Ciclos de vida</h3>
    <!-- Mostrar mensajes relacionados con los ciclos de vida del componente -->
    <ul wire:change>
    @foreach($infos as $info)
        <li >{{ $info }}</>
    @endforeach
    </ul>



    <x-button wire:click="mostar">
        mostrar datos
    </x-button>
</div>
