<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $title = '';
    public $name = '';
    public $infos = [];

    public function mount()
    {
        $this->infos[] = 'La aplicación está siendo montada';
        //El mount se ejecuta antes de redenrizar o mostrar las vistas.
        //Por lo regular se usan cuando se quiere inicializar valores, clases, varilables o hacer consultas a la base de datos.
    }
    
    public function hydrate()
    {
        $this->infos[] = 'La aplicación está siendo hidratada';
        //El metodo Hydrate se usa para hidratar, o sea que se usa para realizar acciones antes de renderizar la vista.
        // como por ejemplo para hacer consultas a la base de datos, o inicializar valores.
    }
    public function dehydrate()
    {
        $this->infos[] = 'La aplicación está siendo deshidratada';
    }

    public function updating($name, $value)
    {
        $this->infos[] = "La aplicación está actualizando la propiedad: $name";
    }

    public function updated($name, $value)
    {
        $this->infos[] = "La aplicación ha actualizado la propiedad: $name a $value";
    }

    public function updatingName()
    {
        $this->infos[] = 'La aplicación está actualizando el nombre';
    }

    public function updatedName()
    {
        $this->infos[] = 'La aplicación ha actualizado el nombre';
        // dd($this->infos);

    }

    public function mostar(){
        dd($this->infos);
    }
    public function render()
    {
        return view('livewire.product');
        
    }
}
