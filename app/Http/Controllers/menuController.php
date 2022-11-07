<?php

namespace App\Http\Controllers;

use App\Models\ofrecimiento;
use App\Models\ciudad;
use App\Models\tipo;

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
        return view('layouts/mainContent')->with("viewData",$viewData);
    }

    public function lixo($v1,$v2) {
        echo "$v1 - $v2";
    }

}
