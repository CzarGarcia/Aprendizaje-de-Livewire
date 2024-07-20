<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    public  $hola, $user;
    
    public function mount($user)
    {
        $this->user = User::find($user);
    }

    
    public function render()
    {
        return view('livewire.create-post');
    }
}
