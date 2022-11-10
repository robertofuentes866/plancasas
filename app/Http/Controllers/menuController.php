<?php

namespace App\Http\Controllers;

use App\Models\ofrecimiento;
use App\Models\ciudad;
use App\Models\tipo;
use Illuminate\Support\Facades\DB;

class menuController extends Controller
{   

    public function inicio($gestion,$id_propiedad) {
        $viewData = [];
        $viewData['titulo'] = "Plancasas BR - Sea Bienvenido";
        $viewData['nav_link_inicio'] = "nav-link active";
        $viewData['nav_link_registrar'] = "nav-link";
        $viewData['nav_link_entrar'] = "nav-link";
        $viewData['ofrecimiento'] = ofrecimiento::all();
        $viewData['tipo'] = tipo::all();
        $viewData['ciudad'] = ciudad::all();
        $viewData['gestion'] = $gestion;
        $viewData['id_propiedad'] = $id_propiedad;
        $viewData['propiedades_destacadas'] = count(DB::table('casas')->where([['destacado','=',1],['disponibilidad','=',1]])->get());
        return view('layouts/mainContent')->with("viewData",$viewData);
    }

    public function indexacion() {
        return $this->inicio(0,0);
    }

}
