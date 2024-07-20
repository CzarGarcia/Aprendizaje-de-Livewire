<?php

namespace App\Livewire;

use Livewire\Component;

class Pruebas extends Component
{
    public $users = [];
    public $user;
    public $userSelected = 'No seleccionado';
    public $numberUsers;
    public $show = false;
    public $numberLetterName = 0;

    public function AddUserName(){
        array_push($this->users, $this->user);
        $this->reset('user');
        $this->reset('numberLetterName');
        $this->numberUsers++;
    }
    public function numberLettersMethod(){
        $this->numberLetterName++;
        
    }

    public function UserSelect($user){
        $this->userSelected = $user;
    }
    public function DeleteUser($index){
        unset($this->users[$index]);            
        $this->numberUsers--;
    }

    public function render()
    {
        return view('livewire.pruebas');
    }
}
