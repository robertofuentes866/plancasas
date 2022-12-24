@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Casa
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.casaForm.update',['id'=>$data['casas']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-lg-3">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Agente:</label>
                <div class="col-lg-12"> 
                <select name="id_agente" class="form-control">
                    @foreach ($data["agentes"] as $agente)
                    <option <?= $agente['id_agente'] == $data['casas']->getIdAgente()?"selected":"" ?> value="{{$agente['id_agente']}}">{{$agente['nombre']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

    <div class="col-lg-3">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Localizacion:</label>
                <div class="col-lg-12"> 
                <select name="id_localizacion" class="form-control">
                    @foreach ($data["localizaciones"] as $localizacion)
                    <<option <?= $localizacion['id_localizacion'] == $data['casas']->getIdLocalizacion()?"selected":"" ?> value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>

    </div>

    <div class="col-lg-3">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Casa No.:</label>
                <div class="col-lg-12"> 
                <input name="casaNumero" value="{{$data['casas']->getCasaNumero()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-lg-3">
    <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Tipo Vivienda:</label>
                <div class="col-lg-12"> 
                <select name="id_subtipo" class="form-control">
                    @foreach ($data["subtipos"] as $subtipo)
                    <<option <?= $subtipo['id_subtipo'] == $data['casas']->getIdSubTipo()?"selected":"" ?> value="{{$subtipo['id_subtipo']}}">{{$subtipo['subtipo']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>  
    </div>

    <div class="col-12">
                <div class="mb-3 row">
                <label for="descripcion" class="col-lg-12 col-form-label">Descripcion:</label>
                <div class="col-lg-12"> 
                <textarea name="descripcion" class="form-control" id="descripcion" rows="5">{{$data['casas']->getDescripcion()}}</textarea>
                </div>
                </div>
    </div>

</div>  <!-- Fin de row -->

<div class="row">
    
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Area construccion:</label>
                <div class="col-lg-4"> 
                <input name="area_construccion" value="{{$data['casas']->getAreaConstruccion()}}" type="number" min="30" max="1000" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Area terreno:</label>
                <div class="col-lg-4"> 
                <input name="area_terreno" value="{{$data['casas']->getAreaTerreno()}}" type="number" min="30" max="10000" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Año Construccion:</label>
                <div class="col-lg-4"> 
                <input name="ano_construccion" value="{{$data['casas']->getAnoConstruccion()}}" type="number" min="1950" max="{{date('Y')}}" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Plantas:</label>
                <div class="col-lg-4"> 
                <input name="plantas" value="{{$data['casas']->getPlantas()}}" type="number" min="1" max="5" class="form-control"> 
                </div>
                </div>
    </div>
    
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Garage:</label>
                <div class="col-lg-4"> 
                <input name="garage" value="{{$data['casas']->getGarage()}}" type="number" min="0" max="20" class="form-control"> 
                </div>
                </div>

    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Habitaciones:</label>
                <div class="col-lg-4"> 
                <input name="habitaciones" value="{{$data['casas']->getHabitaciones()}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
    </div>
    
</div>  <!-- Fin de Row -->
<div class="row">
    

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Baños:</label>
                <div class="col-lg-4"> 
                <input name="banos" value="{{$data['casas']->getBanos()}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
                <input name="id_tipo" value="1" type="hidden">
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Aires Acondicionado:</label>
                <div class="col-lg-4"> 
                <input name="aires_acondicionado" value="{{$data['casas']->getAiresAcondicionado()}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
                
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Abanicos de Techo:</label>
                <div class="col-lg-4"> 
                <input name="abanicos_techo" value="{{$data['casas']->getAbanicosTecho()}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
                <input name="id_tipo" value="1" type="hidden">
    </div>

    
</div>   <!-- End Row --> 

<div class="row">

    <div class="col-lg-4">
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getPiscina()?"checked":""}} class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">Piscina?</label>
        </div>
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getCuartoDomestica()?"checked":""}} class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
            <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica?</label>
        </div>
    </div>
    <div class=col-lg-4>

        <div class="form-check form-check-inline">
            <input {{$data['casas']->getBanoSocial()?"checked":""}} class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
            <label class="form-check-label" for="inlineCheckbox3">Baño Social?</label>
        </div>

        <div class="form-check form-check-inline">
                <input {{$data['casas']->getAguaCaliente()?"checked":""}} class="form-check-input" type="checkbox" name="agua_caliente" id="inlineCheckbox5">
                <label class="form-check-label" for="inlineCheckbox1">Agua caliente?</label>
            </div>

    </div>  <!--End col-4 -->

    <div class="col-lg-4">

        <div class="form-check form-check-inline">
                <input {{$data['casas']->getTanqueAgua()?"checked":""}} class="form-check-input" type="checkbox" name="tanque_agua" id="inlineCheckbox6">
                <label class="form-check-label" for="inlineCheckbox2">Tanque de agua?</label>
        </div>

        <div class="form-check form-check-inline">
                <input {{$data['casas']->getSistemaSeguridad()?"checked":""}} class="form-check-input" type="checkbox" name="sistema_seguridad" id="inlineCheckbox7">
                <label class="form-check-label" for="inlineCheckbox2">Sistema de seguridad?</label>
        </div>
            
        </div>  <!--End col-4 -->


    <div class="row">

        <div class="col-lg-4">

            <div class="form-check form-check-inline">
                <input {{$data['casas']->getDestacado()?"checked":""}} class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox9">
                <label class="form-check-label" for="inlineCheckbox2">Destacado?</label>
            </div>
            
            <div class="form-check form-check-inline">
                <input {{$data['casas']->getDisponibilidad()?"checked":""}} class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox8">
                <label class="form-check-label" for="inlineCheckbox1">Disponibilidad?</label>
            </div>
            
            
        </div>  <!--End col-4 -->
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3">Guardar</button>
<button type="button" class="btn btn-primary mt-3"><a style="text-decoration:none;color:beige" href="{{ route('admin.casaForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>

@endsection