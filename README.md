Componentes anidados se encuentra en Father e Hijo.

1. Uso Directo en Blade
Puedes incluir un componente Livewire directamente dentro de otro componente Blade:

blade
<livewire:child-component :property="$value" />
2. Método de Renderización
Puedes llamar a un componente Livewire desde otro componente en el método render():

php
Copiar código
public function render()
{
    return view('livewire.parent-component')
        ->with('childComponent', Livewire::mount('child-component', ['property' => $value])->html());
}
3. Componentes Anidados en Vistas
Incluir componentes en vistas:

blade
<!-- parent-component.blade.php -->
<div>
    @livewire('child-component', ['property' => $value])
</div>
4. Usando Slots
Livewire también soporta slots para pasar contenido a componentes hijos:

blade
<!-- parent-component.blade.php -->
<div>
    <livewire:child-component>
        <x-slot name="header">Header Content</x-slot>
    </livewire:child-component>
</div>
5. Composición de Componentes en PHP
En el controlador del componente padre, puedes llamar al componente hijo y pasarle parámetros:

php

public function render()
{
    return view('livewire.parent-component', [
        'childComponent' => Livewire::mount('child-component', ['property' => $value])
    ]);
}
Ejemplo Completo
ParentComponent.php:

php
namespace App\Http\Livewire;

use Livewire\Component;

class ParentComponent extends Component
{
    public $value = 'Some Value';

    public function render()
    {
        return view('livewire.parent-component');
    }
}
parent-component.blade.php:

blade
<div>
    <livewire:child-component :property="$value" />
</div>
ChildComponent.php:




php

namespace App\Http\Livewire;

use Livewire\Component;

class ChildComponent extends Component
{
    public $property;

    public function mount($property)
    {
        $this->property = $property;
    }

    public function render()
    {
        return view('livewire.child-component');
    }
}
child-component.blade.php:

blade
<div>
    Property: {{ $property }}

Eventos y mas  se encuentran em pruebas.

Validaciones estan en los Forms como formCreate.



NOTAS: 
el wire:navigation sirve para que se haga la petición en segundo plano



Persistencia de elementos.:

@persist('player')
    <audio src="{{asset('audios/audio.mp4')}} " controls></audio>
@endpersist

