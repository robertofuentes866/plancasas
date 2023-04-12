@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-4 col-12 bg-primary">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
        <div class="card-header" style="text-align:center">
            <header><h6><strong>Buscar casa venta-renta por Residencial </strong></h6></header>
        </div>
        <div class="card-body">
        <form method="get" action="{{route('casas-venta-renta',['gestion'=>1])}}">
        @csrf
        <div class="form-group row">
                <label for="tipo" class="col-lg-6 col-form-label">Tipo <span class='requerido'>(Requerido)</span></label>
                
                    <select name="id_tipo" id="tipo">
                                    <option value="">** Tipo de propiedad **</option>
                                   
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                                    @endforeach
                    </select> 
                
            </div>

            <div class="form-group row">
                <label for="ofrecimiento" class="col-lg-8 col-form-label">Compra o Venta <span class="requerido">(Requerido)</span></label>
                
                    <select name="id_ofrecimiento" id="ofrecimiento">
                                    <option value="">*** Desea comprar o alquilar ? ***</option>
                                    @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                        <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                    @endforeach
                    </select> 
                
            </div>
            @livewire('select-component',['viewData'=>$viewData])
            <div class="form-group row my-3">
                        <div class="col-12">
                            <button type="submit" id="submitForm1" name="submit" class="btn btn-secondary col-12">Buscar</button>
                        </div>
                    </div>
        
    </form> 
        </div>
    </div>

    <!-- Formulario detallado -->
    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
    <div class="card-header" style="text-align:center">
       <header><h6><strong>Buscar casa venta-renta con mas detalles </strong></h6></header>
    </div>
    <div class="card-body bg-danger">
    <form method="get" action="{{route('casas-venta-renta',['gestion'=>3])}}">
            @csrf
        <fieldset>
            <legend>Seleccione</legend>  
            
            <div class="form-group row">
                <label for="tipo" class="col-lg-6 col-form-label">Tipo <span class='requerido'>(Requerido)</span></label>
         
                <select class="w-75 ms-3" name="id_tipo" id="tipo">
                    <option value="">** Tipo de propiedad **</option>
                    
                    @foreach($viewData['tipo'] as $tipo)
                        <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                    @endforeach
                </select> 
         
            </div>

            <div class="form-group row">
                <label for="ciudad" class="col-lg-6 col-form-label">Ciudad</label>
         
                <select class="w-75 ms-3" id="ciudad" name="id_ciudad"> 
                     <option value="">**Ubicacion Ciudad **</option>
                        @foreach($viewData['ciudades'] as $ciudad)
                            <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                        @endforeach
                </select>
         
            </div>

            <div class="form-group row">
                <label for="recurso" class="col-lg-6 col-form-label">Recurso</label>
         
                <select class="w-75 ms-3" id="recurso" name="id_recurso"> 
                        <option value="">**Requerir muebles ?**</option>
                        @foreach($viewData['recurso'] as $recurso)
                            <option value="{{$recurso->id_recurso}}">{{$recurso->recurso}}</option>
                        @endforeach
                </select>
         
            </div>

            <div class="form-group row">
                <label for="duracion" class="col-lg-6 col-form-label">Contrato</label>
         
                <select class="w-75 ms-3" onchange=ajustarPrecios(this.value) id="duracion" name="id_duracion"> 
                        <option value="">**Duracion del Contrato**</option>
                        @foreach($viewData['duracion'] as $duracion)
                            <option value="{{$duracion->id_duracion}}">{{$duracion->duracion}}</option>
                        @endforeach
                </select>
         
            </div>
        </fieldset>
        <fieldset>
            <legend>Indique lo minimo de:</legend>
            <table class="tabla_de_formulario">
                <tr> 
                    <div class="form-group mt-2">
                       <td> <label for="habitaciones" >Habitaciones:</label></td>
                        <td class="tabla_de_formulario_columna"><input name="habitaciones" value="0" type="number" min="0" max="25" ></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group mt-2">
                       <td> <label for="banos" >Banos:</label></td>
                       <td class="tabla_de_formulario_columna"> <input name="banos" value="0" type="number" min="0" max="25" ></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group mt-2">
                        <td><label for="aires_acondicionado" >Aire Acondicionados:</label></td>
                        <td class="tabla_de_formulario_columna"><input name="aires_acondicionado" value="0" type="number" min="0" max="25" ></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group mt-2">
                        <td><label for="abanicos_techo" >Abanicos:</label></td>
                        <td class="tabla_de_formulario_columna"><input name="abanicos_techo" value="0" type="number" min="0" max="25" ></td>
                    </div>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend> Indique lo deseado</legend> 
            <table class="tabla_de_formulario">
                <tr>
            <div class="form-group mt-2">
                <td><label class="form-check-label" for="cuartoDomestica"> Cuarto Domestica?</label></td>
                <td class="tabla_de_formulario_columna_check"><input class="form-check-input ms-2" type="checkbox" name= "cuartoDomestica" id="cuartoDomestica"></td>

                <td><label class="form-check-label ms-5" for="piscina"> Piscina?</label></td>
                <td class="tabla_de_formulario_columna_check"><input class="form-check-input ms-2" type="checkbox" name= "piscina" id="piscina"></td>
                
            </div>
                </tr>
                <tr>
            <div class="form-group mt-2">
                <td><label class="form-check-label" for="agua_caliente"> Agua Caliente?</label></td>
                <td class="tabla_de_formulario_columna_check"><input class="form-check-input ms-2" type="checkbox" name= "agua_caliente" id="agua_caliente"></td>

                <td><label class="form-check-label ms-5" for="tanque_agua">Tanque Agua?</label></td>
                <td class="tabla_de_formulario_columna_check"><input class="form-check-input ms-2" type="checkbox" name="tanque_agua" id="tanque_agua"></td>
                
            </div>
                </tr>
                <tr>
            <div class="form-group mt-2">
                <td><label class="form-check-label" for="sistema_seguridad">Sist. Seguridad?</label></td>
                <td class="tabla_de_formulario_columna_check"><input class="form-check-input ms-2" type="checkbox" name= "sistema_seguridad" id="sistema_seguridad"></td>
                
            </div>
                </tr>
            </table>
        </fieldset>

        </fieldset>
            <div class="form-group row">
                <label for="precio_minimo" class="col-lg-4 col-form-label">Precio Minimo</label>
                <input class="w-75 ms-3 CurrencyInput" name="precio_minimo" value="100" type="number" step="10" min="100" max="2000000">

                <label for="precio_maximo" class="col-lg-4 col-form-label">Precio Maximo</label>
                <input class="w-75 ms-3" name="precio_maximo" value="1000" type="number" step="50" min="200" max="2000000">

                <!--<label for="Range1" class="form-label">Precio mínimo</label>
                <span id="Range1Val" style="color:red;">US$ 0</span>
                <input type="range" value="100" name="precio_minimo" min="1000" max="500000" step="1000" class="form-range" id="Range1"
                  oninput=changeValueRange1(this.value)>

                <label for="Range2" class="form-label">Precio máximo</label>
                <span id="Range2Val" style="color:red;">US$ 1000</span>
                <input type="range" value="500" name="precio_maximo" min="1000" max="500000" step="1000" class="form-range" id="Range2"
                  oninput="changeValueRange2(this.value)"> -->
         
            </div>
        
               
            <div class="form-group row my-3">
                <div class="col-12">
                    <button type="submit" id="submitForm2" name="buscar" class="btn btn-secondary col-12">Buscar</button>
                </div>
            </div>
    </form>
    </div>
    </div>

    
</div>

@switch ($viewData['gestion']) 
 
  @case (0)    
            @livewire('thumbs-photos',['gestion'=>0,'titulo'=>'Casas y Terrenos Destacados'])  <!-- muestra fotos destacadas en la pagina principal  -->
            @break

  @case (1)
       
        @livewire('thumbs-photos',['gestion'=>1,'ofrecimiento'=>$_GET['id_ofrecimiento']??0,'ciudad'=>$_GET['id_ciudad']??0,
                                'localizacion'=>$_GET['id_localizacion']??0,'titulo'=>'Resultado de busqueda','tipo'=>$_GET['id_tipo']??0])  <!-- muestra resultado del formulario en la pagina principal.  -->
        @break
  @case (2)
  
    @livewire('thumbs-photos',['gestion'=>2,'titulo'=>'Detalle de la casa o terreno seleccionado','id_propiedad'=>$viewData['id_propiedad']])  <!-- muestra la propiedad seleccionada en los thumbnails.  -->
        @break

 @case (3)
    
    @livewire('thumbs-photos',['gestion'=>3,'titulo'=>'Resultado de busqueda','id_ciudad'=>$_GET['id_ciudad']??0,
    'id_recurso'=>$_GET['id_recurso']??0,'id_duracion'=>$_GET['id_duracion']??0,'habitaciones'=>$_GET['habitaciones']??0,
    'banos'=>$_GET['banos']??0,'aires_acondicionado'=>$_GET['aires_acondicionado']??0,
    'abanicos_techo'=>$_GET['abanicos_techo']??0,'precio_minimo'=>$_GET['precio_minimo']??0,'precio_maximo'=>$_GET['precio_maximo']??0,
    'agua_caliente'=>$_GET['agua_caliente']??0,'tanque_agua'=>$_GET['tanque_agua']??0,'sistema_seguridad'=>$_GET['sistema_seguridad']??0,
    'cuartoDomestica'=>$_GET['cuartoDomestica']??0,'piscina'=>$_GET['piscina']??0,'tipo'=>$_GET['id_tipo']])  <!-- muestra resultado del formulario detallado.  -->
       @break

@endswitch

@endsection