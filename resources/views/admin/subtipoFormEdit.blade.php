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
<form method="POST" action="{{ route('admin.subTipoForm.update',['id_subtipo'=>$data['subtipos']->id_subtipo]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">
<div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Tipos de propiedad:{{$data['subtipos']->subtipo}}</label>
</div>

<div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Subtipo:</label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
        <input name="subtipo" value="{{ $data['subtipos']->subtipo }}" type="text" class="form-control">
    </div>
</div>

</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.subTipoForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection