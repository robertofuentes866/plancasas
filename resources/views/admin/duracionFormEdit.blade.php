@extends('layouts.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Duracion
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.duracionForm.update', ['id'=> $viewData['duraciones']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Duracion:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="duracion" value="{{$viewData['duraciones']->getDuracion()}}" type="text" class="form-control">
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Editar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{route('admin.duracionForm.index')}}">Regresar</a></button>
</form>

</div>
</div>
@endsection