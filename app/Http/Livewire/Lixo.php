<?php

namespace App\Http\Livewire;
use App\Models\ciudad;
use App\Models\localizacion;

use Livewire\Component;

class Lixo extends Component
{
    public $selectedCiudad = null;
    public $localizaciones = [];
    
    public function render()
    {
        return view('livewire\lixo',['ciudades'=>ciudad::all()]);
    }

    public function updatedselectedCiudad($id) {
        $this->localizaciones = localizacion::where('id_ciudad',$id)->get();
    }
}
