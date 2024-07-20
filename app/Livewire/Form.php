<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Form extends Component
{
    
    public $posts;
    public $categories;
    public $category_id;
    public $title;
    public $content;
    public $category;
    public $tags;
    public $selectedTags = [];
    public $is_published;
    public $image_path;
    public $open = false;
    public $postId;
    public $postEdit = [
        'title' => '',
        'content' => '',
        'category_id' => '',
        'tags' => [],
    ];
    public $postEditId = '';

    
    public function mount(){
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function save(){


        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'selectedTags' => 'required',
        ],[
            'title.required' => 'El campo título es requerido',
            'content.required' => 'El campo contenido es requerido',
            'category_id.required' => 'El campo categoría es requerido',
            'category_id.exists' => 'La categoría seleccionada no existe',
            'selectedTags.required' => 'El campo etiquetas es requerido',
        ]);


        $post = Post::create(
            $this->only('title', 'content', 'category_id')
        );

        $post->tags()->attach($this->selectedTags);
        $this->posts = Post::all();
        $this->js("alert('Publicación creada con éxito!')");
    }


    public function edit($postId)
    {
        $this->open = true;

        $this->postEditId = $postId;

        $post = Post::find($postId);
        
        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();
    }

    public function delete($postId){
        $post = Post::find($postId);
        $post->delete();
        $this->posts = Post::all();
        
    }



    public function update(){
        $post = Post::find($this->postEditId);


        $post->update([
            'category_id' => $this->postEdit['category_id'],
            'title' => $this->postEdit['title'],
            'content' => $this->postEdit['content'],
        ]);
        

        $post->tags()->sync($this->postEdit['tags']);
        $this->posts = Post::all();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.form');
    }
}
