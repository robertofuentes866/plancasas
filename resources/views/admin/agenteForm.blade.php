@extends('layouts.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Agentes
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.agenteForm.store') }}" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Privilegio:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<select name="id_privilegio" class="form-control">
     @foreach ($data["privilegios"] as $privilegio)
       <option value="{{$privilegio['id_privilegio']}}">{{$privilegio['nombre']}}</option>
     @endforeach
</select> 
</div>
</div>
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Apellidos:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="apellidos" value="{{old('apellidos')}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">email:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="email" value="{{old('email')}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">password:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="password" value="{{old('password')}}" type="password" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cel No. 1:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="cel1" value="{{old('cel1')}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cel No. 2:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="cel2" value="{{old('cel2')}}" type="text" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Agente:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_agente" id="foto_agente" type="file" class="form-control"> 
</div>
</div>

</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>
</div>

</form>
</div>
</div>




<div class="card">
<div class="card-header">
Ver Agentes
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">PRIVILEGIO</th>
<th scope="col">NOMBRES</th>
<th scope="col">APELLIDOS</th>
<th scope="col">EMAIL</th>
<th scope="col">CEL # 1</th>
<th scope="col">CEL # 2</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($data["relacion"] as $relacion)
<tr>
<td>{{ $relacion->privilegio }}</td>
<td>{{ $relacion->nombre }}</td>
<td>{{ $relacion->apellidos }}</td>
<td>{{ $relacion->email }}</td>
<td>{{ $relacion->cel1 }}</td>
<td>{{ $relacion->cel2 }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.agenteForm.edit',['id'=>$relacion->id_agente])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.agenteForm.delete',['id'=>$relacion->id_agente])}}" method="post" class="formulario_eliminar">
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