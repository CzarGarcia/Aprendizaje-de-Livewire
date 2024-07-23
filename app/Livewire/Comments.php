<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{

    public $comments = [
        'This is a comment',
        'This is another comment',
        'This is a third comment',
    ];

    // !para escucar los eventos de las otras clases se utiliza el atributo On

    #[On('postCreated')]
    public function addComment($comment){
        //! La función array_unshift añade un elemento al inicio del array, en este caso, añadimos un nuevo comentario
        //? https://www.php.net/manual/es/function.array-unshift.php (añades el array y el elemento a añadir)

        array_unshift($this->comments, $comment);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
