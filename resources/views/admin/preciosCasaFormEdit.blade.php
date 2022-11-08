@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Editar Precios Casas
</div>
<div class="card-body">
@if($errors->any())
    <ul class="alert alert-danger list-unstyled">
    @foreach($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('admin.preciosCasaForm.update',['id_casa'=>$data['preciosCasa'][0]->id_casa,'id_ofrecimiento'=>$data['preciosCasa'][0]->id_ofrecimiento,
                                        'id_duracion'=>$data['preciosCasa'][0]->id_duracion,'id_recurso'=>$data['preciosCasa'][0]->id_recurso]) }}" enctype="form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-3">
                <div class="mb-3 row">
                   <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Casa No.: <b>{{ $data['preciosCasa'][0]->casaNumero }}</b>  </label>
                </div>
    </div>

    <div class="col-3">
                <div class="mb-3 row">
                    <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Ofrecimiento:<b> {{$data['preciosCasa'][0]->ofrecimiento}}</b></label>
                </div>

    </div>

    <div class="col-3">
                <div class="mb-3 row">
                    <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Duracion:<b> {{$data['preciosCasa'][0]->duracion}}</b></label>
                </div>
    </div>

    <div class="col-3">
                <div class="mb-3 row">
                    <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Recurso:<b> {{$data['preciosCasa'][0]->recurso}}</b></label>
                </div>
    </div>

</div>  <!-- Fin de row -->

<div class="row">
    <div class="col-2">
                <div class="mb-3 row">
                <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Precio:</label>
                <div class="col-lg-12 col-md-6 col-sm-12"> 
                <input name="valor" value="{{$data['preciosCasa'][0]->valor}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->

<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.preciosCasaForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection