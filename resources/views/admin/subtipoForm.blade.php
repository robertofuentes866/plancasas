@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Subtipos de propiedades
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.subTipoForm.store') }}" enctype="form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Tipos de propiedad:</label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
        <select name="id_tipo" class="form-control">
            @foreach ($data["tipos"] as $tipo)
              <option value="{{$tipo['id_tipo']}}">{{$tipo['tipo']}}</option>
            @endforeach
        </select> 
    </div>
</div>

<div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Subtipo:</label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
        <input name="subtipo" value="{{ old('subtipo') }}" type="text" class="form-control">
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
Ver Subtipos
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">ID TIPO</th>
<th scope="col">TIPO</th>
<th scope="col">ID SUBTIPO</th>
<th scope="col">SUBTIPO</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
@foreach ($data["relacion"] as $relacion)
<tr>
<td>{{ $relacion->id_tipo }}</td>
<td>{{ $relacion->tipo }}</td>
<td>{{ $relacion->id_subtipo }}</td>
<td>{{ $relacion->subtipo }}</td>
<td> 
    
    <a class="btn btn-primary" href="{{route('admin.subTipoForm.edit',['id_tipo'=>$relacion->id_tipo,'id_subtipo'=>$relacion->id_subtipo])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.subTipoForm.delete',['id_subtipo'=>$relacion->id_subtipo])}}" method="post" class="formulario_eliminar">
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