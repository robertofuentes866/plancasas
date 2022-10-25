@extends('layouts.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Fotos - Casa
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif

<form method="POST" action="{{ route('admin.fotosCasaForm.store') }}" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Casa:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<select name="id_casa" class="form-control">
     @foreach ($data["casas"] as $casa)
       <option value="{{$casa['id_casa']}}">{{$casa['casaNumero']}}</option>
     @endforeach
</select> 
</div>
</div>
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Leyenda:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="leyenda" value="{{ old('leyenda') }}" type="text" class="form-control">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 form-check-label" for="inlineCheckbox5">Es Principal:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input class="form-check-input" type="checkbox" name="es_principal" id="inlineCheckbox5">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Normal:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_normal" id="foto_normal" type="file" class="form-control"> 
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Pequeña:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_thumb" id="foto_thumb" type="file" class="form-control"> 
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
Ver Fotos
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">RESIDENCIAL</th>
<th scope="col">CASA</th>
<th scope="col">LEYENDA</th>
</tr>
</thead>
<tbody>
@foreach ($data["relacion"] as $relacion)
<tr>
<td>{{ $relacion->residencial }}</td>
<td>{{ $relacion->casaNumero }}</td>
<td>{{ $relacion->leyenda }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.fotosCasaForm.edit',['id'=>$relacion->id_foto])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.fotosCasaForm.delete',['id'=>$relacion->id_foto])}}" method="post" class="formulario_eliminar">
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