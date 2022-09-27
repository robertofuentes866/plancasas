<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ciudad;
use App\Models\localizacion;

class SelectComponent extends Component
{
    public $selectedCiudad = null;
    public $localizaciones=[];

    public function updatedselectedCiudad($id_ciudad){
        $this->localizaciones = localizacion::where('id_ciudad',$id_ciudad)->get();
    }

    public function render()
    {
        return view('livewire.select-component',['ciudades'=>ciudad::all()]);
    }
}
