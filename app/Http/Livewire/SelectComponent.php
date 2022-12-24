<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ciudad;
use App\Models\localizacion;
use App\Models\ofrecimiento;
use Illuminate\Support\Facades\DB;
use App\Models\recurso;
use App\Models\duracion;

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
       $this->viewData['tipo'] = DB::table('subtipos')->join('tipos','tipos.id_tipo','=','subtipos.id_tipo')
                                               ->select('subtipos.id_tipo','id_subtipo','subtipo')
                                               ->get();  // usado para formulario.
       
       $this->viewData['ciudades'] = ciudad::all();
    }

    public function render()
    {
        $this->viewData();
       
        return view('livewire.select-component');
    }
}
