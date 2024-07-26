<div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4">


    <x-button wire:click="redirigir">
        Prueba
    </x-button>

@persist('player')
    <audio src="{{asset('audios/audio.mp4')}} " controls></audio>
@endpersist
    Componentes anidados.

    <x-input wire:model.live="name"/>

    <div>
        {{-- @livewire('hijo', [
            'nameFather'=>$name
        ]) --}}

        {{-- <livewire:hijo :name="$name"> --}}

        {{-- //!Sincronizar --}}

        <livewire:hijo wire:model='name'> 
    </div>




<script>
    console.log('Componente padre')
</script>
</div>
