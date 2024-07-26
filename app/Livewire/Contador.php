<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $count = 0;
    public $numero = 0;
    public $palabra;

    public function increment($cant)
    {
        $this->count ++;
    }

    public function updatingCount(){
        $this->numero ++;
    }

    public function decrement()
    {
        $this->count--;
    }

    // Método boot estático en Livewire v2
    public  function boot()
    {
        // Añadir un macro a todos los componentes que resetea el contador a cero
        Component::macro('resetCount', function () {
            $this->count = 0;
        });

        // Configuraciones globales o inicializaciones generales
    }

    public function render()
    {
        return view('livewire.contador');
    }
    
}
