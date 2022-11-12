@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-4 bg-primary">  <!-- Primera columna, la del formulario -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
    <div class="card-header" style="text-align:center"><strong>Búsqueda de Propiedad </strong></div>
    <div class="card-body">
    <form method="get" action="{{route('menu.inicio',['gestion'=>1,'id_propiedad'=>0])}}">
            @csrf
            <div class="form-group row">
                <label for="tipo" class="col-lg-6 col-form-label">Tipo</label>
                
                    <select name="id_tipo" id="tipo">
                                    <option value="">** Tipo **</option>
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_tipo}}">{{$tipo->tipo}} </option>
                                    @endforeach
                    </select> 
                
            </div>

            <div class="form-group row">
                <label for="ofrecimiento" class="col-lg-6 col-form-label">Ofrecimiento</label>
                
                    <select name="id_ofrecimiento" id="ofrecimiento">
                                    <option value="">*** Ofrecimiento ***</option>
                                    @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                        <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                    @endforeach
                    </select> 
                
            </div>
            
                <livewire:select-component/>
            
               
            <div class="form-group row my-3">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-secondary">Buscar</button>
                </div>
            </div>
    </form>
    </div>
    </div>

    <!-- Formulario detallado -->
    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
    <div class="card-header" style="text-align:center"><strong>Búsqueda detallada </strong></div>
    <div class="card-body">
    <form method="get" action="{{route('menu.inicio',['gestion'=>3,'id_propiedad'=>0])}}">
            @csrf
            
            <div class="form-group row">
                <label for="ciudad" class="col-lg-4 col-form-label">Ciudades</label>
         
                <select id="ciudad" name="id_ciudad"> 
                        
                        @foreach($viewData['ciudad'] as $ciudad)
                            <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                        @endforeach
                </select>
         
            </div>

            <div class="form-group row">
                <label for="recurso" class="col-lg-4 col-form-label">Recurso</label>
         
                <select id="recurso" name="id_recurso"> 
                        
                        @foreach($viewData['recurso'] as $recurso)
                            <option value="{{$recurso->id_recurso}}">{{$recurso->recurso}}</option>
                        @endforeach
                </select>
         
            </div>

            <div class="form-group row">
                <label for="duracion" class="col-lg-4 col-form-label">Duracion</label>
         
                <select id="duracion" name="id_duracion"> 
                       
                        @foreach($viewData['duracion'] as $duracion)
                            <option value="{{$duracion->id_duracion}}">{{$duracion->duracion}}</option>
                        @endforeach
                </select>
         
            </div>

            <div class="form-group mt-2">
                <label for="habitaciones" >Habitaciones Mínima:</label>
                <input name="habitaciones" value="1" type="number" min="1" max="25" >
            </div>

            <div class="form-group mt-2">
                <label for="banos" >Baños Mínimo:</label>
                <input name="banos" value="1" type="number" min="1" max="25" >
            </div>

            <div class="form-group mt-2">
                <label for="aires_acondicionado" >A/A Mínimo:</label>
                <input name="aires_acondicionado" value="0" type="number" min="0" max="25" >
            </div>

            <div class="form-group mt-2">
                <label for="abanicos_techo" >Abanicos Mínimo:</label>
                <input name="abanicos_techo" value="0" type="number" min="0" max="25" >
            </div>

            <div class="form-group mt-2">
                <label class="form-check-label" for="cuartoDomestica"> Cuarto Domestica?</label>
                <input class="form-check-input" type="checkbox" name= "cuartoDomestica" id="cuartoDomestica">

                <label class="form-check-label ms-3" for="piscina"> Piscina?</label>
                <input class="form-check-input" type="checkbox" name= "piscina" id="piscina">
                
            </div>

            <div class="form-group mt-2">
                <label class="form-check-label" for="agua_caliente"> Agua Caliente?</label>
                <input class="form-check-input" type="checkbox" name= "agua_caliente" id="agua_caliente">

                <label class="form-check-label" for="tanque_agua">Tanque Agua?</label>
                <input class="form-check-input" type="checkbox" name= "tanque_agua" id="tanque_agua">
                
            </div>

            <div class="form-group mt-2">
                <label class="form-check-label" for="sistema_seguridad">Sist. Seguridad?</label>
                <input class="form-check-input" type="checkbox" name= "sistema_seguridad" id="sistema_seguridad">
                
            </div>

               
            <div class="form-group row my-3">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-secondary">Buscar</button>
                </div>
            </div>
    </form>
    </div>
    </div>

    
</div>

@switch ($viewData['gestion']) 
 
  @case (0)    
            @if($viewData['propiedades_destacadas'])
              
                @livewire('thumbs-photos',['tipo'=>0,'titulo'=>'Propiedades Destacadas'])  <!-- muestra fotos destacadas en la pagina principal  -->
            @else
                @livewire('imagenes-grupo')
            @endif
            @break

  @case (1)

        @livewire('thumbs-photos',['tipo'=>1,'ofrecimiento'=>$_GET['id_ofrecimiento'],'ciudad'=>$_GET['id_ciudad'],
                                'localizacion'=>$_GET['id_localizacion'],'titulo'=>'Resultado de busqueda'])  <!-- muestra resultado del formulario en la pagina principal.  -->
        @break
  @case (2)
    @livewire('thumbs-photos',['tipo'=>2,'titulo'=>'Detalle de la propiedad seleccionada','id_propiedad'=>$viewData['id_propiedad']])  <!-- muestra la propiedad seleccionada en los thumbnails.  -->
        @break

 @case (3)
    @livewire('thumbs-photos',['tipo'=>3,'titulo'=>'Detalle de la propiedad seleccionada','id_propiedad'=>$viewData['id_propiedad']])  <!-- muestra la propiedad seleccionada en los thumbnails.  -->
        @break
@endswitch

@endsection