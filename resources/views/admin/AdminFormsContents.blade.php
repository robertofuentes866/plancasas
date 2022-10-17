@extends('layouts.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
FORMULARIOS DE ENTRADA DE DATOS
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="GET" action="{{route('admin.controlForms')}}" enctype="form-data">
@csrf
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Seleccione Formulario:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<select name="table" class="form-control">
    
    @foreach($viewData['tables'] as $tabla =>$nombre)
       <option value="{{$tabla}}">{{$nombre}}</option>
    @endforeach
</select>
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Ir</button>
</form>

</div>
</div>
@endsection