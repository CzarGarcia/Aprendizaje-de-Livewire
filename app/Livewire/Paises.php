<?php

namespace App\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $paises = [
        'Argentina',
        'Brasil',
        'Chile',
        'Colombia',
        'Ecuador',
        'Perú',
        'Uruguay',
        'Venezuela',
    ];
    
    public $pais;
    public $active;
    public $count;

    public function Increment(){
        $this->count++;
    }

    public function showActive($pais){
        $this->active = $pais;
    }

    public function delete($index){
        unset($this->paises[$index]);
    
    }

    public function save(){
        array_push($this->paises, $this->pais);

        $this->reset('pais');
        
    }

    public function render()
    {
        return view('livewire.paises');
    }
}
