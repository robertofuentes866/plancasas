@extends('layouts.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar privilegios
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.privilegioForm.update', ['id'=> $viewData['privilegios']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="nombre" value="{{ $viewData['privilegios']->getNombre() }}" type="text" class="form-control">
</div>
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Select</label>
  <input name="select" {{ $viewData['privilegios']->getSelect()?"checked":"" }} class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Insert</label>
  <input name="insert" {{ $viewData['privilegios']->getInsert()?"checked":"" }} class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Update</label>
  <input name="update" {{ $viewData['privilegios']->getUpdate()?"checked":"" }} class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<div class="form-check">
<label class="form-check-label" for="flexCheckDefault">Delete</label>
  <input name="delete" {{ $viewData['privilegios']->getDelete()?"checked":"" }} class="form-check-input" type="checkbox" id="flexCheckDefault">
</div>

<button type="submit" class="btn btn-primary">Editar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.privilegioForm.index')}}">Regresar</a></button>
</form>

</div>
</div>
@endsection