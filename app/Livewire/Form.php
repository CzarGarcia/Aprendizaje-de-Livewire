<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Form extends Component
{
    public PostEditForm $postEdit;
    public PostCreateForm $postCreate;
    public $posts;
    public $categories;
    public $category;
    

    public $tags;
    public $is_published;
    public $image_path;
    public $open = false;
    public $postId;


   
    public $postEditId = '';


    //! El metodo mount se ejecuta cuando se inicializa el componente, este es para el ciclo de vida de los componentes de livewire
    //? CICLO DE VIDA DE LOS COMPONENTES DE LIVEWIRE
    public function mount(){

        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function updating($property, $value){
        dd($property);
    }
    
    public function save(){
        $this->postCreate->save();
        $this->posts = Post::all();

        //* Para emitir un evento se utiliza el método thispatch y se le pasa el nombre del evento y los datos que se quieren enviar.
        $this->dispatch('postCreated', 'Nuevo post creado');
    }

    public function edit($postId)
    {
       $this->postEdit->edit($postId);
       $this->dispatch('postCreated', 'Editando post');
    }

    public function delete($postId){
        $post = Post::find($postId);
        $post->delete();
        $this->posts = Post::all();
        $this->dispatch('postCreated', "Post {$postId} eliminado");
    }
    
    public function update(){
        
        $this->postEdit->update();
        $this->posts = Post::all();
        $this->postEdit->open = false;
    }

    public function render()
    {
        return view('livewire.form');
    }
}






// COMENTARIOS NOTAS

//!REGLAS DE VALIDACIÓN
// * En el método rules() se definen las reglas de validación para los campos del formulario.

    //? public function rules(){
    //     return [
    //         'postCreate.title' => 'required',
    //         'postCreate.content' => 'required',
    //         'postCreate.category_id' => 'required|exists:categories,id',
    //         'postCreate.tags' => 'required|array',
    //     ];
    // }

    //? public function messages(){
    //     return [
    //         'postCreate.title.required' => 'El título es requerido',
    //         'postCreate.content.required' => 'El contenido es requerido',
    //         'postCreate.category_id.required' => 'La categoría es requerida',
    //         'postCreate.category_id.exists' => 'La categoría no existe',
    //         'postCreate.tags.required' => 'Seleccionar minimo 1 etiqueta',
    //     ];
    // }
    


    //? #[Rule('required', message: 'El título es requerido')]
    // public $title;
    // #[Rule('required', message: 'El contenido es requerido')]
    // public $content;
    // #[Rule('required|exists:categories,id', as: 'categoria')]
    // public $category_id;
    // #[Rule('required|array', message: 'Seleccionar minimo 1 etiqueta')]
    // public $selectedTags = [];


    //? #[Rule([
    //     'postCreate.title' => 'required',
    //     'postCreate.content' => 'required',
    //     'postCreate.category_id' => 'required|exists:categories,id',
    //     'postCreate.tags' => 'required|array',
    // ],
    // [
    //     'postCreate.title.required' => 'The: El título es requerido',
    // ])]




    //? public $postCreate = [
    //     'title' => '',
    //     'content' => '',
    //     'category_id' => '',
    //     'tags' => [],
    // ];