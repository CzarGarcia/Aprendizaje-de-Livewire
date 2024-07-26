<div>
    <div class="bg-white shadow rounded-lg p-6">
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input class="w-full" wire:model.live="postCreate.title"/>
                <x-input-error for="postCreate.title"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Contenido
                </x-label>
                <x-textarea class="w-full" wire:model="postCreate.content"></x-textarea>
                <x-input-error for="postCreate.content"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>
                <x-select class="w-full" wire:model.live="postCreate.category_id">
                    <option value="">Seleccionar categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="postCreate.category_id"/>
            </div>

            <div>
                <x-label>
                    Etiquetas
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox name="tags[]" wire:model="postCreate.tags" value="{{ $tag->id }}"/>
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <x-input-error for="postCreate.selectedTags"/>
            </div>

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
    </div>

    <x-dialog-modal wire:model="postEdit.open">
        <x-slot name="title">
            Actualizar Post
        </x-slot>

        <x-slot name="content">
            <div>
                <div class="py-12">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white shadow rounded-lg p-6">
                            <form wire:submit.prevent="update">
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
                                    <x-select class="w-full" wire:model="postEdit.category_id">
                                        <option value="">Seleccionar categoria</option>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button style="margin-right: 1rem;" wire:click="update">
                    Actualizar
                </x-button>
                <x-danger-button wire:click="$set('postEdit.open',false)">
                    Cancelar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modal>

@push('js')
    <script>

    //  Esto sirve para que se ejecute el evento de livewire cuando se crea un post en la consola
                Livewire.on('postCreated',function(comment){
                console.log('Post creado');
            });
       
    </script>   
@endpush

        
</div>


