@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Foto - Casa
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.fotosCasaForm.update',['id'=>$data['fotosCasa']->getId()]) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col">

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Leyenda:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="leyenda" value="{{ $data['fotosCasa']->leyenda }}" type="text" class="form-control">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 form-check-label" for="inlineCheckbox5">Es Principal:</label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input {{$data['fotosCasa']->getEsPrincipal()?"checked":""}} class="form-check-input" type="checkbox" name="es_principal" id="inlineCheckbox5">
</div>
</div>

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Normal: <b>[{{basename($data['fotosCasa']->foto_normal)}}]</b></label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_normal" id="foto_normal" type="file" class="form-control"> 
</div>
</div>
@if(!is_null($data['fotosCasa']->foto_normal))
    <div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Normal:</label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
    <img src="{{asset('/storage/propiedades/'.$data['fotosCasa']->foto_normal)}}"> 
    </div>
    </div>
@endif

<div class="mb-3 row">
<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Pequeña: <b>[{{basename($data['fotosCasa']->foto_thumb)}}]</b></label>
<div class="col-lg-10 col-md-6 col-sm-12"> 
<input name="foto_thumb" id="foto_thumb" type="file" class="form-control"> 
</div>
</div>
@if(!is_null($data['fotosCasa']->foto_thumb))
    <div class="mb-3 row">
    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Foto Pequeña:</label>
    <div class="col-lg-10 col-md-6 col-sm-12"> 
    <img width="{{$data['thumbAncho']}}" height="{{$data['thumbAlto']}}" src="{{asset('/storage/propiedades/'.$data['fotosCasa']->foto_thumb)}}"> 
    </div>
    </div>
@endif


</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.fotosCasaForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection
