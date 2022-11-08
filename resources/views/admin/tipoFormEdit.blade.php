@extends('admin.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Tipo de propiedad
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.tipoForm.update', ['id'=> $viewData['tipos']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Tipo:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="tipo" value="{{$viewData['tipos']->getTipo()}}" type="text" class="form-control">
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.tipoForm.index')}}">Regresar</a></button>
</form>

</div>
</div>
@endsection