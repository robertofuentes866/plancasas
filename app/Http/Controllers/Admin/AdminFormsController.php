<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFormsController extends Controller
{
    public function index() { // el formulario de la tabla se desea seleccionar.
        $viewData = [];
        $viewData['title'] = "Panel de Administracion - Visual Home";
        $viewData['tables'] = ["admin.tipoForm.index"=>"Tabla Tipos de propiedades",
                               "admin.subTipoForm.index"=>"Tabla Sub-tipos de propiedades",
                                "admin.ofrecimientoForm.index"=>"Tabla Ofrecimientos",
                                "admin.recursoForm.index"=>"Tabla Recursos",
                                "admin.ciudadForm.index"=>"Tabla Ciudades",
                                 "admin.duracionForm.index"=>"Tabla Duraciones",
                                 "admin.localizacionForm.index"=>"Tabla Localizaciones",
                                 "admin.privilegioForm.index"=>"Tabla Privilegios",
                                 "admin.agenteForm.index"=>"Tabla Agentes",
                                 "admin.casaForm.index"=>"Tabla Propiedades",
                                  "admin.fotosCasaForm.index"=>"Fotos propiedad",
                                  "admin.preciosCasaForm.index"=>"Precios propiedad"];
        return view('admin.AdminFormsContents')->with("viewData",$viewData);
    }

    public function showForm(Request $request) {
        return redirect()->route($request->table);
    }
}
