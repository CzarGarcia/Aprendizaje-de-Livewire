<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prueba
        </h2>
    </x-slot>

{{-- ! El persist sirve para reproducir sin cerrar --}}
@persist('player')
    <audio src="{{asset('audios/audio.mp4')}} " controls></audio>
@endpersist

<script>
    console.log('Componente pruebas')
</script>

</x-app-layout>