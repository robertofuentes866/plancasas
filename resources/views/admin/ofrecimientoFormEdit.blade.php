@extends('layouts.home')
@section('title', $viewData["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Ofrecimiento
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.ofrecimientoForm.update', ['id'=> $viewData['ofrecimientos']->getId()]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Ofrecimiento:</label>
<div class="col-lg-10 col-md-6 col-sm-12">
<input name="ofrecimiento" value="{{$viewData['ofrecimientos']->getOfrecimiento()}}" type="text" class="form-control">
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Editar</button>
</form>

</div>
</div>
@endsection