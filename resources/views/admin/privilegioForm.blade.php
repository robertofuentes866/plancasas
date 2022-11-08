@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Privilegios
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.privilegioForm.store') }}" enctype="form-data">
@csrf
<div class="row">
<div class="col">

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control">
</div>
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Select</label>
  <input name="select" class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Insert</label>
  <input name="insert" class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Update</label>
  <input name="update" class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Delete</label>
  <input name="delete" class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>
</form>

</div>
</div>
<div class="card">
<div class="card-header">
Ver Privilegios
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">NOMBRE</th>
<th scope="col">SELECT</th>
<th scope="col">INSERT</th>
<th scope="col">UPDATE</th>
<th scope="col">DELETE</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($data["table"] as $privilegio)
<tr>
<td>{{ $privilegio->getId() }}</td>
<td>{{ $privilegio->getNombre() }}</td>

<td>{{ $privilegio->getSelect()?"Si":"No" }}</td>
<td>{{ $privilegio->getInsert()?"Si":"No" }}</td>
<td>{{ $privilegio->getUpdate()?"Si":"No" }}</td>
<td>{{ $privilegio->getDelete()?"Si":"No" }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.privilegioForm.edit',['id'=>$privilegio->getId()])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.privilegioForm.delete',['id'=> $privilegio->getId()])}}" method="post" class="formulario_eliminar">
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