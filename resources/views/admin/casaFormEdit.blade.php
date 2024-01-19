@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
    <div class="card-header">
        Editar propiedad
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.casaForm.update',['id'=>$data['casas']->getId()]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="id_tipo" value="1" type="hidden">
        <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 g-2">
            <div class="col">
                <div class="form-floating">
                    <select id="id_agente" name="id_agente" class=" form-select">
                        @foreach ($data["agentes"] as $agente)
                            <option <?= $agente['id_agente'] == $data['casas']->getIdAgente()?"selected":"" ?> value="{{$agente['id_agente']}}">{{$agente['nombre'].' '.$agente['apellidos']}}</option>
                        @endforeach
                    </select> 
                    <label for="id_agente">Agente</label> 
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                        <select id="id_localizacion" name="id_localizacion" class="form-select">
                            @foreach ($data["localizaciones"] as $localizacion)
                                <option <?= $localizacion['id_localizacion'] == $data['casas']->getIdLocalizacion()?"selected":"" ?> value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
                            @endforeach
                        </select> 
                    <label for="id_localizacion">Localización</label> 
                </div>
            </div>

            <div class="col ">
                <div class="form-floating">
                    <select id="id_subtipo" name="id_subtipo" class="form-select">
                        @foreach ($data["subtipos"] as $subtipo)
                            <option <?= $subtipo['id_subtipo'] == $data['casas']->getIdSubTipo()?"selected":"" ?> value="{{$subtipo['id_subtipo']}}">{{$subtipo['subtipo']}}</option>
                        @endforeach
                    </select> 
                    <label for="id_subtipo">Tipo propiedad</label> 
                </div>
            </div>

            <div class="col ">
                <div class="form-floating">
                    <input id="casaNumero" name="casaNumero" value="{{$data['casas']->getCasaNumero()}}" type="text" class="form-control">
                    <label for="casaNumero">Propiedad No.</label> 
                </div>
            </div>
        
        </div> 

        <div class="row row-cols-1">
            <div class="col">
                <div class="form-floating">
                    <textarea name="descripcion" class=" form-text col-12" id="descripcion" rows="5">{{$data['casas']->getDescripcion()}}</textarea>
                    <label for="descripcion">Descripcion</label>
                </div>
            </div>
        </div>  <!-- Fin de row -->

        <div class="row row-cols-lg-6 row-cols-md-4 row-cols-sm-2 row-cols-1 g-2">

            <div class="col">
                <div class="form-floating">
                    <input id="area_construccion" name="area_construccion" value="{{$data['casas']->getAreaConstruccion()}}" type="number" min="0" max="1000" class="form-control">     
                    <label for="area_construccion">Area construccion (mt2)</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input name="area_terreno" value="{{$data['casas']->getAreaTerreno()}}" type="number" min="0" max="10000" class="form-control">     
                    <label for="area_terreno">Area terreno (mt2)</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input name="ano_construccion" value="{{$data['casas']->getAnoConstruccion()}}" type="number" min="1930" max="{{date('Y')}}" class="form-control">     
                    <label for="ano_construccion">Año Construcción</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="plantas" name="plantas" value="{{$data['casas']->getPlantas()}}" type="number" min="1" max="5" class="form-control">     
                    <label for="plantas">Plantas</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="garage" name="garage" value="{{$data['casas']->getGarage()}}" type="number" min="0" max="20" class="form-control">     
                    <label for="garage">Garage</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="aires_acondicionado" name="aires_acondicionado" value="{{$data['casas']->getAiresAcondicionado()}}" type="number" min="0" max="25" class="form-control">     
                    <label for="aires_acondicionado">Aires Acondicionado</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="habitaciones" name="habitaciones" value="{{$data['casas']->getHabitaciones()}}" type="number" min="0" max="25" class="form-control">     
                    <label for="habitaciones">Habitaciones</label>
                </div>
            </div>
    
            <div class="col">
                <div class="form-floating">
                    <input id="banos" name="banos" value="{{$data['casas']->getBanos()}}" type="number" min="0" max="25" class="form-control">     
                    <label for="banos">Baños</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="abanicos_techo" name="abanicos_techo" value="{{$data['casas']->getAbanicosTecho()}}" type="number" min="0" max="25" class="form-control">     
                    <label for="abanicos_techo">Abanicos de techo</label>
                </div>
            </div>

        </div>  <!-- End row -->

    <div class="row row-cols-lg-8 row-cols-md-4 row-cols-2 g-3 mt-3 border">

        <div class="col d-flex flex-column">
            <div class="form-check form-switch">
                <input {{$data['casas']->getPiscina()?"checked":""}} class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
                <label class="form-check-label" for="inlineCheckbox1">Piscina?</label>
            </div>

            <div class="form-check form-switch">
                <input {{$data['casas']->getCuartoDomestica()?"checked":""}} class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
                <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica?</label>
            </div>
        </div>

        <div class="col d-flex flex-column">

            <div class="form-check form-switch">
                <input {{$data['casas']->getBanoSocial()?"checked":""}} class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
                <label class="form-check-label" for="inlineCheckbox3">Baño Social?</label>
            </div>

            <div class="form-check form-switch">
                    <input {{$data['casas']->getAguaCaliente()?"checked":""}} class="form-check-input" type="checkbox" name="agua_caliente" id="inlineCheckbox5">
                    <label class="form-check-label" for="inlineCheckbox1">Agua Caliente?</label>
            </div>
            
        </div>

        <div class="col d-flex flex-column">
                <div class="form-check form-switch">
                    <input {{$data['casas']->getTanqueAgua()?"checked":""}} class="form-check-input" type="checkbox" name="tanque_agua" id="inlineCheckbox6">
                    <label class="form-check-label" for="inlineCheckbox2">Tanque de agua?</label>
                </div>

                <div class="form-check form-switch">
                    <input {{$data['casas']->getSistemaSeguridad()?"checked":""}} class="form-check-input" type="checkbox" name="sistema_seguridad" id="inlineCheckbox7">
                    <label class="form-check-label" for="inlineCheckbox1">Sistema de Seguridad?</label>
                </div>    
        </div> 
   
   

            <div class="col d-flex flex-column">

                <div class="form-check form-switch">
                    <input {{$data['casas']->getDestacado()?"checked":""}} class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox9">
                    <label class="form-check-label" for="inlineCheckbox2">Destacado</label>
                </div>

                <div class="form-check form-switch">
                    <input {{$data['casas']->getDisponibilidad()?"checked":""}} class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox8">
                    <label class="form-check-label" for="inlineCheckbox1">Disponibilidad</label>
                </div>

            </div>

    </div>  <!--End row -->

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    <button type="button" class="btn btn-primary mt-3"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>


</form>
    </div>
    </div>

@endsection
@extends('admin.botonEliminar')