<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\localizacion;
use App\Models\ofrecimiento;
use App\Models\ciudad;
use App\Models\tipo;
use Illuminate\Support\Facades\Storage;

class menuController extends Controller
{

    public function inicio() {
        $viewData = [];
        $viewData['titulo'] = "Plancasas BR - Sea Bienvenido";
        $viewData['ofrecimiento'] = ofrecimiento::all();
        $viewData['tipo'] = tipo::all();
        $viewData['ciudad'] = ciudad::all();
        return view('layouts/mainContent')->with("viewData",$viewData);
    }

}
