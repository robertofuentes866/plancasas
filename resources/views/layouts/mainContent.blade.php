@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-3 col-12">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
        <div class="card-header" style="text-align:center">
            <header><h6><strong>Buscar casa por Residencial </strong></h6></header>
        </div>
        <div class="card-body">
            <form method="get" action="{{route('casas-venta-renta',['gestion'=>1])}}">
                @csrf
                <div class="form-group row">

                    <div class="input-group">
                        <label for="tipo" class="input-group-text">Tipo</label>
                        <select name="id_tipo" id="tipo" class="form-select">
                                            <option value="">*Opciones*</option>
                                        
                                            @foreach($viewData['tipo'] as $tipo)
                                                <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                                            @endforeach
                        </select>
                    </div>
                        
                </div>

                <div class="form-group row">
                    <div class="input-group">
                            <label for="ofrecimiento" class="input-group-text">Comprar o Rentar</label>
                    
                        <select name="id_ofrecimiento" id="ofrecimiento" class="form-select">
                                        <option value="">*Opciones*</option>
                                        @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                            <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                        @endforeach
                        </select> 
                    </div>
                    
                    
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
</div> <!-- Término de la columna del primer formulario que será el de la izquierda -->

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

<div class="col-lg-3 col-12">
 <!-- Formulario detallado -->
    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
        <div class="card-header" style="text-align:center">
            <header><h6><strong>Buscar con mas detalles</strong></h6></header>
        </div>
    <div class="card-body">
        <form method="get" action="{{route('casas-venta-renta',['gestion'=>3])}}">
                @csrf
            <fieldset>
                <legend>Seleccione</legend>  
                
                <div class="form-group row">
                    <div class="input-group">
                        <label for="tipo" class="input-group-text">Tipo</label>
            
                        <select class="form-select" name="id_tipo" id="tipo">
                            <option value="">*Opciones*</option>
                            
                            @foreach($viewData['tipo'] as $tipo)
                                <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                            @endforeach
                        </select> 
                    </div>
                </div>

                <div class="form-group row">
                    <div class="input-group">
                        <label for="ciudad" class="input-group-text">Ciudad</label>
            
                        <select class="form-select" id="ciudad" name="id_ciudad"> 
                            <option value="">*Opciones*</option>
                                @foreach($viewData['ciudades'] as $ciudad)
                                    <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="input-group">
                        <label for="recurso" class="input-group-text">Recurso</label>
            
                        <select class="form-select" id="recurso" name="id_recurso"> 
                                <option value="">*Opciones*</option>
                                @foreach($viewData['recurso'] as $recurso)
                                    <option value="{{$recurso->id_recurso}}">{{$recurso->recurso}}</option>
                                @endforeach
                        </select>
                    </div>
                    
            
                </div>

                <div class="form-group row">
                    <div class="input-group">
                        <label for="duracion" class="input-group-text">Contrato</label>
            
                        <select class="form-select" onchange=ajustarPrecios(this.value) id="duracion" name="id_duracion"> 
                                <option value="">*Opciones*</option>
                                @foreach($viewData['duracion'] as $duracion)
                                    <option value="{{$duracion->id_duracion}}">{{$duracion->duracion}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Lo mínimo de:</legend>
                    <div class="d-flex flex-column">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="habitaciones" >Habitaciones</label>
                            <input class="form-control " name="habitaciones" value="0" type="number" min="0" max="25" >
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="banos" >Baños</label>
                            <input class="form-control" id="banos" name="banos" value="0" type="number" min="0" max="25" >
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="aires_acondicionado" >A/A</label>
                            <input class="form-control" id="aires_acondicionado" name="aires_acondicionado" value="0" type="number" min="0" max="25" >
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="abanicos_techo" >Abanicos</label>
                            <input class="form-control" id="abanicos_techo" name="abanicos_techo" value="0" type="number" min="0" max="25" >
                        </div>

                    </div>
            </fieldset>

            <fieldset>
                <legend>Preferencias</legend> 
                
                <div class="form-group mt-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex mb-3 justify-content-between">
                            <label for="cuartoDomestica" class="input-group-text"> Cuarto Domestica?</label>
                            <div class="bg-light px-3 rounded d-flex align-items-center">
                                <input class="form-check" type="checkbox" name= "cuartoDomestica" id="cuartoDomestica">
                            </div>
                        </div>

                        <div class="d-flex mb-3 justify-content-between">
                            <label for="piscina" class="input-group-text"> Sistema Seguridad?</label>
                            <div class="bg-light px-3 rounded d-flex align-items-center">
                                <input class="form-check" type="checkbox" name= "sistema_seguridad" id="sistema_seguridad">
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3 justify-content-between">
                            <label for="piscina" class="input-group-text"> Tanque de agua?</label>
                            <div class="bg-light px-3 rounded d-flex align-items-center">
                                <input class="form-check" type="checkbox" name= "tanque_agua" id="tanque_agua">
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3 justify-content-between">
                            <label for="piscina" class="input-group-text">Agua caliente?</label>
                            <div class="bg-light px-3 rounded d-flex align-items-center">
                                <input class="form-check" type="checkbox" name= "agua_caliente" id="agua_caliente">
                            </div>
                        </div>


                        <div class="d-flex mb-3 justify-content-between">
                            <label for="piscina" class="input-group-text"> Piscina?</label>
                            <div class="bg-light px-3 rounded d-flex align-items-center">
                                <input class="form-check" type="checkbox" name= "piscina" id="piscina">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </fieldset>

            </fieldset>
            <fieldset>
            <legend> Precios</legend>
                <div class="form-group row">
                    <div class="input-group mb-3">
                        <label for="precio_minimo" class="input-group-text">Precio Minimo</label>
                        <input class="form-control" name="precio_minimo" value="100" type="number" step="10" min="100" max="2000000">
                    </div>
                    <div class="input-group">
                        <label for="precio_maximo" class="input-group-text">Precio Maximo</label>
                        <input class="form-control" name="precio_maximo" value="1000" type="number" step="50" min="200" max="2000000">
                    </div>

                    

                    <!--<label for="Range1" class="form-label">Precio mínimo</label>
                    <span id="Range1Val" style="color:red;">US$ 0</span>
                    <input type="range" value="100" name="precio_minimo" min="1000" max="500000" step="1000" class="form-range" id="Range1"
                    oninput=changeValueRange1(this.value)>

                    <label for="Range2" class="form-label">Precio máximo</label>
                    <span id="Range2Val" style="color:red;">US$ 1000</span>
                    <input type="range" value="500" name="precio_maximo" min="1000" max="500000" step="1000" class="form-range" id="Range2"
                    oninput="changeValueRange2(this.value)"> -->
            
                </div>
            </fieldset>  
            <div class="form-group row my-3">
                <div class="col-12">
                    <button type="submit" id="submitForm2" name="buscar" class="btn btn-secondary col-12">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    
</div>

@endsection