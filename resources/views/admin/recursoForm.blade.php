@extends('layouts.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Recursos
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.recursoForm.store') }}" enctype="form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Recurso:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="recurso" value="{{ old('recurso') }}" type="text" class="form-control">
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>

</div>
</div>
<div class="card">
<div class="card-header">
Ver Recursos
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">RECURSO</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($data["table"] as $recurso)
<tr>
<td>{{ $recurso->getId() }}</td>
<td>{{ $recurso->getRecurso() }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.recursoForm.edit',['id'=>$recurso->getId()])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.recursoForm.delete',['id'=> $recurso->getId()])}}" method="post">
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