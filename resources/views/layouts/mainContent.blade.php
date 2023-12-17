@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-3 col-12">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto">
        <div class="card-header" style="text-align:center">
            <header>
                <h6><strong>Buscar casa por Residencial </strong></h6>
                <p class="text-danger d-inline">Campos requerido *</p>

            </header>
        </div>
        
        <div class="card-body px-0">
            <form method="get" action="{{route('casas-venta-renta',['gestion'=>1])}}">
                @csrf
                <div class="container">
                    <div class="row row-cols-2 row-cols-lg-1">

                
                        <div class="col">
                            <div class="form-floating mb-2">
                                
                                <select name="id_tipo" id="tipo" class="form-select">
                                    <option selected value="">Ver opciones</option>
                                
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                                    @endforeach
                                </select>
                                <label for="tipo"><span class="text-danger">* Tipo propiedad</span></label>
                            </div>
                        </div>
                    
                        <div class="col">
                            <div class="form-floating mb-2">
                                <select name="id_ofrecimiento" id="ofrecimiento" class="form-select">
                                                <option value="">Ver opciones</option>
                                                @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                                    <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                                @endforeach
                                </select>
                                <label for="ofrecimiento"><span class="text-danger">* Comprar o Rentar</span></label>
                            </div>
                        </div>
                    
                        @livewire('select-component',['viewData'=>$viewData])
                        
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <button type="submit" id="submitForm1" name="submit" class=" col-12 btn btn-secondary">Buscar</button>
                        </div>
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
    <div class="card text-black bg-light mb-3 mt-1 mx-auto">
        <div class="card-header" style="text-align:center">
            <header>
                <h6><strong>Buscar con mas detalles</strong></h6>
                <p class="text-danger d-inline">Campos requeridos *</p>
            </header>
        </div>
        <div class="card-body px-1">
            <form method="get" action="{{route('casas-venta-renta',['gestion'=>3])}}">
                @csrf
                <div class="container">
                    <div class="row row-cols-2 row-cols-lg-1">

                        <div class="col px-1 mb-2">
                            <fieldset class="h-100">
                                <legend><small>Selección</small></legend>  
                                <div class="row d-flex flex-column">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="id_tipo" id="tipo">
                                            <option value="">Ver opciones</option>
                                            
                                            @foreach($viewData['tipo'] as $tipo)
                                                <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                                            @endforeach
                                        </select>
                                        <label for="tipo"><span class="text-danger">* Tipo</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="ciudad" name="id_ciudad"> 
                                            <option value="">Ver opciones</option>
                                                @foreach($viewData['ciudades'] as $ciudad)
                                                    <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                                                @endforeach
                                        </select>
                                        <label for="ciudad">Ciudad</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="recurso" name="id_recurso"> 
                                            <option value="">Ver opciones</option>
                                            @foreach($viewData['recurso'] as $recurso)
                                                <option value="{{$recurso->id_recurso}}">{{$recurso->recurso}}</option>
                                            @endforeach
                                        </select>
                                        <label for="recurso">Recurso</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" onchange=ajustarPrecios(this.value) id="duracion" name="id_duracion"> 
                                                <option value="">Ver opciones</option>
                                                @foreach($viewData['duracion'] as $duracion)
                                                    <option value="{{$duracion->id_duracion}}">{{$duracion->duracion}}</option>
                                                @endforeach
                                        </select>
                                        <label for="duracion">Contrato</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col px-1 mb-2">
                            <fieldset class="h-100">
                                <legend><small>Lo mínimo de:</small></legend>
                                <div class="d-flex flex-column">
                                    <div class="form-floating mb-3">
                                        <input id="habitaciones" class="form-control " name="habitaciones" value="0" type="number" min="0" max="25" >
                                        <label for="habitaciones" >Habitaciones</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="banos" name="banos" value="0" type="number" min="0" max="25" >
                                        <label for="banos" >Baños</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="aires_acondicionado" name="aires_acondicionado" value="0" type="number" min="0" max="25" >
                                        <label for="aires_acondicionado" >Aire Acondicionado</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="abanicos_techo" name="abanicos_techo" value="0" type="number" min="0" max="25" >
                                        <label for="abanicos_techo" >Abanicos</label>
                                    </div>
                                
                            </fieldset>
                        </div>
                        <div class="col px-1 mb-2">
                            <fieldset class="h-100">
                                <legend><small>Preferencias</small> </legend> 
                                <div class="d-flex flex-column">
                                    <div class="d-flex mb-3 justify-content-between">
                                        <label for="cuartoDomestica" class="form-check-label"> Cuarto Domestica?</label>
                                        <div class="bg-light px-3 rounded d-flex align-items-center">
                                            <input class="form-check" type="checkbox" name= "cuartoDomestica" id="cuartoDomestica">
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3 justify-content-between">
                                        <label for="piscina" class="form-check-label"> Sist. Seguridad?</label>
                                        <div class="bg-light px-3 rounded d-flex align-items-center">
                                            <input class="form-check" type="checkbox" name= "sistema_seguridad" id="sistema_seguridad">
                                        </div>
                                    </div>
                        
                                    <div class="d-flex mb-3 justify-content-between">
                                        <label for="piscina" class="form-check-label"> Tanque de agua?</label>
                                        <div class="bg-light px-3 rounded d-flex align-items-center">
                                            <input class="form-check" type="checkbox" name= "tanque_agua" id="tanque_agua">
                                        </div>
                                    </div>
                        
                                    <div class="d-flex mb-3 justify-content-between">
                                        <label for="piscina" class="form-check-label">Agua caliente?</label>
                                        <div class="bg-light px-3 rounded d-flex align-items-center">
                                            <input class="form-check" type="checkbox" name= "agua_caliente" id="agua_caliente">
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3 justify-content-between">
                                        <label for="piscina" class="form-check-label"> Piscina?</label>
                                        <div class="bg-light px-3 rounded d-flex align-items-center">
                                            <input class="form-check" type="checkbox" name= "piscina" id="piscina">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col px-1 mb-2">
                            <fieldset class="h-100">
                                <legend><small>Precios</small> </legend>
                                <div class="form-group row">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precio_minimo" name="precio_minimo" value="100" type="number" step="100" min="100" max="1000000">
                                    <label for="precio_minimo">Precio Minimo</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="precio_maximo" name="precio_maximo" value="1000" type="number" step="100" min="200" max="2000000">
                                    <label for="precio_maximo">Precio Maximo</label>
                                </div>
                                <!--<label for="Range1" class="form-label">Precio mínimo</label>
                                <span id="Range1Val" style="color:red;">US$ 0</span>
                                <input type="range" value="100" name="precio_minimo" min="1000" max="500000" step="1000" class="form-range" id="Range1"
                                oninput=changeValueRange1(this.value)>

                                <label for="Range2" class="form-label">Precio máximo</label>
                                <span id="Range2Val" style="color:red;">US$ 1000</span>
                                <input type="range" value="500" name="precio_maximo" min="1000" max="500000" step="1000" class="form-range" id="Range2"
                                oninput="changeValueRange2(this.value)"> -->
                            </fieldset>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <button type="submit" id="submitForm2" name="buscar" class="btn btn-secondary col-12">Buscar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    
</div>

@endsection