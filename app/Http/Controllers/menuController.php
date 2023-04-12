<?php

namespace App\Http\Controllers;

use App\Models\subtipo;
use App\Models\ciudad;
use App\Models\recurso;
use App\Models\duracion;
use App\Models\ofrecimiento;

use Illuminate\Support\Facades\DB;

class menuController extends Controller
{   

    public function inicio($gestion=0,$id_propiedad=0,$busqueda=' ') {
        session(['camino_mostrar'=>'storage']);
        $viewData = [];
        $viewData['titulo'] = "Visual Home Real Estate";
        $viewData['nav_link_inicio'] = "nav-link active";
        $viewData['nav_link_registrar'] = "nav-link";
        $viewData['nav_link_entrar'] = "nav-link";
       
        $viewData['gestion'] = $gestion;  // usado para definir cual query se va a llamar en thumbsPhotos.php.
        $viewData['id_propiedad'] = $id_propiedad; // cuando selecciona la propiedad para ver detalles.
        
        $viewData['resultadoBusqueda'] = $busqueda; // guarda el resultado de busqueda de algun formulario.
        $viewData['propiedades_destacadas'] = count(DB::table('casas')->where([['destacado','=',1],['disponibilidad','=',1]])->get());
        
        $viewData['tipo'] = subtipo::all();
        $viewData['ciudades'] = ciudad::all();
        $viewData['recurso'] = recurso::all();   // usado para formulario.
        $viewData['duracion'] = duracion::all();  // usado para formulario.

        $viewData['ofrecimiento'] = ofrecimiento::all();

        return view('layouts/mainContent')->with("viewData",$viewData);
    }

    public function indexacion() {
        $valorC = 0;
        session()->put('conta',$valorC);
       
        return $this->inicio();
    }

}
