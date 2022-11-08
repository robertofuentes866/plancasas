@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Agente
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.agenteForm.update',['id'=>$data['agentes']->getId()]) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Privilegio:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<select name="id_privilegio" class="form-control">
     @foreach ($data["privilegios"] as $privilegio)
       <option <?= $privilegio['id_privilegio'] == $data['agentes']->getIdPrivilegio()?"selected":"" ?> value="{{$privilegio['id_privilegio']}}">{{$privilegio['nombre']}}</option>
     @endforeach
</select> 
</div>
</div>
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="nombre" value="{{ $data['agentes']->nombre }}" type="text" class="form-control">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Apellidos:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="apellidos" value="{{$data['agentes']->apellidos}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">email:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="email" value="{{$data['agentes']->email}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">password:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="password" value="{{$data['agentes']->password}}" type="password" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cel No. 1:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="cel1" value="{{$data['agentes']->cel1}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cel No. 2:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="cel2" value="{{$data['agentes']->cel2}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Agente: <b>[{{basename($data['agentes']->foto_agente)}}]</b></label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_agente" id="foto_agente" type="file" class="form-control"> 
</div>
</div>

@if (!is_null($data['agentes']->foto_agente))
    <div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Agente: </label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
    <img width="{{$data['thumbAlto']}}" height="{{$data['thumbAncho']}}" src="{{asset('/storage/agentes/'.$data['agentes']->foto_agente)}}"> 
    </div>
    </div>
@endif


</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.agenteForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection
