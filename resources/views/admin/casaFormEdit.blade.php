@extends('layouts.home')
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
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Agente:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_agente" class="form-control">
                    @foreach ($data["agentes"] as $agente)
                    <option <?= $agente['id_agente'] == $data['casas']->getIdAgente()?"selected":"" ?> value="{{$agente['id_agente']}}">{{$agente['nombre']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Localizacion:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_localizacion" class="form-control">
                    @foreach ($data["localizaciones"] as $localizacion)
                    <<option <?= $localizacion['id_localizacion'] == $data['casas']->getIdLocalizacion()?"selected":"" ?> value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>

    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Recurso:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_recurso" class="form-control">
                    @foreach ($data["recursos"] as $recurso)
                    <option <?= $recurso['id_recurso'] == $data['casas']->getIdRecurso()?"selected":"" ?> value="{{$recurso['id_recurso']}}">{{$recurso['recurso']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

</div>  <!-- Fin de row -->

<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Plantas:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="plantas" value="{{$data['casas']->getPlantas()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Area construccion:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="area_construccion" value="{{$data['casas']->getAreaConstruccion()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Area terreno:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="area_terreno" value="{{$data['casas']->getAreaTerreno()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Casa No.:</label>
                <div class="col-lg-6 col-md-6 col-sm-12"> 
                <input name="casaNumero" value="{{$data['casas']->getCasaNumero()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Garage:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="garage" value="{{$data['casas']->getGarage()}}" type="text" class="form-control"> 
                </div>
                </div>

    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Habitaciones:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="habitaciones" value="{{$data['casas']->getHabitaciones()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Baños:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="banos" value="{{$data['casas']->getBanos()}}" type="text" class="form-control"> 
                </div>
                </div>
                <input name="id_tipo" value="1" type="hidden">
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Año Construccion:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="ano_construccion" value="{{$data['casas']->getAnoConstruccion()}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>   <!-- End Row --> 

<div class="row">

    <div class="col-4">
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getPiscina()?"checked":""}} class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">Piscina</label>
        </div>
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getCuartoDomestica()?"checked":""}} class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
            <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica</label>
        </div>
    </div>
    <div class=col-4>

        <div class="form-check form-check-inline">
            <input {{$data['casas']->getApartamento()?"checked":""}} class="form-check-input" type="checkbox" name= "apartamento" id="inlineCheckbox3">
            <label class="form-check-label" for="inlineCheckbox3"> Es Apartamento</label>
        </div>

        <div class="form-check form-check-inline">
            <input {{$data['casas']->getBanoSocial()?"checked":""}} class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
            <label class="form-check-label" for="inlineCheckbox3">Baño Social</label>
        </div>
        
    </div>  <!--End col-4 -->
    <div class="col-4">
        
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getDisponibilidad()?"checked":""}} class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox5">
            <label class="form-check-label" for="inlineCheckbox1">Disponibilidad</label>
        </div>
        <div class="form-check form-check-inline">
            <input {{$data['casas']->getDestacado()?"checked":""}} class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox6">
            <label class="form-check-label" for="inlineCheckbox2">Destacado</label>
        </div>
        
    </div>  <!--End col-4 -->
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.casaForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>

@endsection