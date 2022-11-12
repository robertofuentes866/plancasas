<?php

namespace App\Http\Controllers;

use App\Models\ofrecimiento;
use App\Models\ciudad;
use App\Models\tipo;
use App\Models\recurso;
use App\Models\duracion;
use Illuminate\Support\Facades\DB;

class menuController extends Controller
{   

    public function inicio($gestion,$id_propiedad) {
        $viewData = [];
        $viewData['titulo'] = "Plancasas BR - Sea Bienvenido";
        $viewData['nav_link_inicio'] = "nav-link active";
        $viewData['nav_link_registrar'] = "nav-link";
        $viewData['nav_link_entrar'] = "nav-link";
        $viewData['ofrecimiento'] = ofrecimiento::all(); // usado para formulario.
        $viewData['tipo'] = tipo::all();  // usado para formulario.
        $viewData['ciudad'] = ciudad::all();   // usado para formulario.
        $viewData['recurso'] = recurso::all();   // usado para formulario.
        $viewData['duracion'] = duracion::all();  // usado para formulario.
        $viewData['gestion'] = $gestion;  // usado para definir cual query se va a llamar en thumbsPhotos.php.
        $viewData['id_propiedad'] = $id_propiedad; // cuando selecciona la propiedad para ver detalles.
        $viewData['propiedades_destacadas'] = count(DB::table('casas')->where([['destacado','=',1],['disponibilidad','=',1]])->get());
        return view('layouts/mainContent')->with("viewData",$viewData);
    }

    public function indexacion() {
        return $this->inicio(0,0);
    }

}
