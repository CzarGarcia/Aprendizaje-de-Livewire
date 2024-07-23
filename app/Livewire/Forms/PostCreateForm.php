<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostCreateForm extends Form
{
    #[Rule('required| min:3', message: 'El título es requerido')]
    public $title;
    #[Rule('required')]
    public $content;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $tags = [];
    

    public function save(){
        $this->validate();

        $post = Post::create(
           $this->only('title', 'content', 'category_id')
        );

        $post->tags()->attach($this->tags);
        $this->reset();
    }
}
