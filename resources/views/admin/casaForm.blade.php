@extends('layouts.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Casas
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.casaForm.store') }}" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Agente:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_agente" class="form-control">
                    @foreach ($data["agentes"] as $agente)
                    <option value="{{$agente['id_agente']}}">{{$agente['nombre'].' '.$agente['apellidos']}}</option>
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
                    <option value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
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
                    <option value="{{$recurso['id_recurso']}}">{{$recurso['recurso']}}</option>
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
                <input name="plantas" value="{{old('plantas')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Area construccion:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="area_construccion" value="{{old('area_construccion')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Area terreno:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="area_terreno" value="{{old('area_terreno')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Casa No.:</label>
                <div class="col-lg-6 col-md-6 col-sm-12"> 
                <input name="casaNumero" value="{{old('casaNumero')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Garage:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="garage" value="{{old('garage')}}" type="text" class="form-control"> 
                </div>
                </div>

    </div>
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Habitaciones:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="habitaciones" value="{{old('habitaciones')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->
<div class="row">
    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Baños:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="banos" value="{{old('banos')}}" type="text" class="form-control"> 
                </div>
                </div>
                <input name="id_tipo" value="1" type="hidden">
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Año Construccion:</label>
                <div class="col-lg-4 col-md-6 col-sm-12"> 
                <input name="ano_construccion" value="{{old('ano_construccion')}}" type="text" class="form-control"> 
                </div>
                </div>
                
    </div>

</div>  <!-- End row -->

<div class="row">
    <div class="col-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">Piscina</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
            <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name= "apartamento" id="inlineCheckbox3">
            <label class="form-check-label" for="inlineCheckbox3"> Es Apartamento</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
            <label class="form-check-label" for="inlineCheckbox3">Baño Social</label>
        </div>
        
    </div>  <!--End col-4 -->
    <div class="col-4">
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox5">
            <label class="form-check-label" for="inlineCheckbox1">Disponibilidad</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox6">
            <label class="form-check-label" for="inlineCheckbox2">Destacado</label>
        </div>
        
    </div>  <!--End col-4 -->
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>
</div>

</form>
</div>
</div>




<div class="card">
<div class="card-header">
Ver Casas
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">CIUDAD</th>
<th scope="col">RESIDENCIAL</th>
<th scope="col">CASA NUMERO</th>
<th scope="col">AGENTE INMOBILIARIO</th>
</tr>
</thead>
<tbody>
@foreach ($data["relacion"] as $relacion)
<tr>
<td>{{ $relacion->ciudad }}</td>
<td>{{ $relacion->residencial }}</td>
<td>{{ $relacion->casaNumero }}</td>
<td>{{ $relacion->nombreAgente }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.casaForm.edit',['id'=>$relacion->id_casa])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.casaForm.delete',['id'=>$relacion->id_casa])}}" method="post" class="formulario_eliminar">
@csrf
@method('DELETE')
<button class="btn btn-danger">
<i class="bi-trash"></i>
</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection
@extends('admin.botonEliminar')