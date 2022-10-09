@extends('layouts.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Tipo de propiedades
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.tipoForm.store') }}" enctype="form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Tipo:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="tipo" value="{{ old('tipo') }}" type="text" class="form-control">
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
Ver Tipo de propiedades
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">TIPO</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($viewData["tipos"] as $tipo)
<tr>
<td>{{ $tipo->getId() }}</td>
<td>{{ $tipo->getTipo() }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.tipoForm.edit',['id'=>$tipo->getId()])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.tipoForm.delete',['id'=> $tipo->getId()])}}" method="post">
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