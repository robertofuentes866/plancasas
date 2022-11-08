@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Ciudades
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.ciudadForm.store') }}" enctype="form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Ciudad:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="ciudad" value="{{ old('ciudad') }}" type="text" class="form-control">
</div>
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
Ver Ciudades
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">CIUDAD</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($data["table"] as $ciudad)
<tr>
<td>{{ $ciudad->getId() }}</td>
<td>{{ $ciudad->getCiudad() }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.ciudadForm.edit',['id'=>$ciudad->getId()])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.ciudadForm.delete',['id'=> $ciudad->getId()])}}" class="formulario_eliminar" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">
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

