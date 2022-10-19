@extends('layouts.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Localizacion
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.localizacionForm.update',['id'=> $data['localizaciones']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Ciudad:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<select name="id_ciudad" class="form-control">
     @foreach ($data["ciudades"] as $ciudad)
       <option <?= $ciudad['id_ciudad'] == $data['localizaciones']->getIdCiudad()?"selected":"" ?> value="{{$ciudad['id_ciudad']}}">{{$ciudad['ciudad']}}</option>
     @endforeach
</select> 
</div>
</div>
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Residencial:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 

<input name="residencial" value="{{ $data['localizaciones']->getResidencial() }}" type="text" class="form-control">
</div>
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Direccion:</label>
<textarea name="direccion" >{{ $data['localizaciones']->getDireccion() }} </textarea> 
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.localizacionForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection