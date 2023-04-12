<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ciudad;
use App\Models\localizacion;
use App\Models\ofrecimiento;
use App\Models\subtipo;

class SelectComponent extends Component
{
    public $selectedCiudad = null;
    public $localizaciones=[];

    public $viewData;

    public function updatedselectedCiudad($id_ciudad){
        $this->localizaciones = localizacion::where('id_ciudad',$id_ciudad)->get();
    }

    private function viewData(){
    
       $this->viewData['ofrecimiento'] = ofrecimiento::all();
      
        $this->viewData['tipo'] = subtipo::all();
       
       $this->viewData['ciudades'] = ciudad::all();
    }

    public function render()
    {
        $this->viewData();
        return view('livewire.select-component');
    }
}
