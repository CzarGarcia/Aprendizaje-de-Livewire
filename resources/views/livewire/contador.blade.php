<div>

   <h1>Contador: {{ $count }}</h1>
    
    <button wire:click="increment(1)">Incrementar</button>
    <button wire:click="decrement">Decrementar</button>
    <button wire:click="resetCount">Resetear</button>

    <!-- Muestra el número de veces que se ha actualizado $count -->
    <div>Actualizaciones del contador: {{ $numero }}</div>
</div>
