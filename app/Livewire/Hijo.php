<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Hijo extends Component
{

    //! El reactive es para que se actualice en tiempo real
    // #[Reactive]

    //Con la ultima para sincronizar los datos no se usal el reactive
    //bidireccional cuando es un unico valor
    #[Modelable]
    public $name;

    

    // RECORDAR EL KEY ES EL NOMBRE DE LA VARIABLE
    public function render()
    {
        return view('livewire.hijo');
    }
}
