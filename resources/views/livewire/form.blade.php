<div>

<div class="bg-white shadow rounded-lg p-6">
    <form wire:submit="save">
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input class="w-full" wire:model="title"/>
            <x-input-error for="title"/>
        </div>

        <div class="mb-4">
            <x-label>
                Contenido
            </x-label>
            <x-textarea class="w-full" wire:model="content"></x-textarea>
            <x-input-error for="content"/>

        </div>

        <div class="mb-4">
            <x-label>
                Categoria
            </x-label>
            <x-select class="w-full" wire:model="category_id">
                <option  value="">Seleccionar categoria</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-select>
            <x-input-error for="category_id"/>

        </div>

        <div>
            <x-label>
                Etiquetas
            </x-label>
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <label>
                            <x-checkbox name="tags[]" wire:model="selectedTags" value="{{ $tag->id }}"/>
                            {{ $tag->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
            <x-input-error for="selectedTags"/>
        </div>
        <x-input type="file" wire:model="photo"/>

        <div class="flex justify-end">
            <x-button>
                Guardar
            </x-button>
        </div>

    </form>   
</div>


<div class="bg-white shadow rounded-lg p-6 mt-4">
    <ul>
        @foreach($posts as $post)
        <li class="flex justify-between mt-2" wire:key="post-{{$post->id}}">
        {{ $post->title }}

        <div>
        <x-button wire:click="edit({{$post->id}})">
            Editar
        </x-button>
        <x-danger-button wire:click="delete({{$post->id}})">
            Eliminar
        </x-danger-button>
        </div>
        </li>
        
        @endforeach
    </ul>
<div/>
{{-- 
@if($open)
{{-- EDITAR --}}



<x-dialog-modal wire:model="open">

    <x-slot name="title">
        Actualizar P
    </x-slot>

    <x-slot name="content">
<div >
     <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form wire:submit="update">
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input class="w-full" wire:model="postEdit.title"/>
        </div>

        <div class="mb-4">
            <x-label>
                Contenido
            </x-label>
            <x-textarea class="w-full" wire:model="postEdit.content"></x-textarea>
        </div>

        <div class="mb-4">
            <x-label>
                Categoria
            </x-label>
            <x-select class="w-full" wire:model="postEdit.category_id" >
                <option  value="">Seleccionar categoria</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div>
            <x-label>
                Etiquetas
            </x-label>
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <label>
                            <x-checkbox name="tags[]" wire:model="postEdit.tags" value="{{ $tag->id }}" />
                            {{ $tag->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

      
    </x-slot>
       
    <x-slot name="footer">
       <div class="flex justify-end">
    <x-button style="margin-right: 1rem;" wire:click="update">
        Actualizar
    </x-button>

    <x-danger-button wire:click="$set('open',false)" >
        Cancelar
    </x-danger-button>
</div>

    </form>   
            </div>
        </div>
    </div>
</div>
    </x-slot>

</x-dialog-modal>

</div>