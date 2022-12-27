@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
<div class="card-header">
Crear Precios Casas
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
<form method="POST" action="{{ route('admin.preciosCasaForm.store') }}" enctype="form-data">
@csrf
<div class="row">
    <div class="col-3">
                <div class="mb-3 row">
                <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Casa:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_casa" class="form-control">
                    @foreach ($data["casas"] as $casa)
                    <option value="{{$casa['id_casa']}}"> {{$casa['casaNumero']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

    <div class="col-3">
                <div class="mb-3 row">
                <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Ofrecimiento:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_ofrecimiento" class="form-control">
                    @foreach ($data["ofrecimientos"] as $ofrecimiento)
                    <option value="{{$ofrecimiento['id_ofrecimiento']}}"> {{$ofrecimiento['ofrecimiento']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>

    </div>

    <div class="col-3">
                <div class="mb-3 row">
                <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Duracion:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_duracion" class="form-control">
                    @foreach ($data["duraciones"] as $duracion)
                    <option value="{{$duracion['id_duracion']}}"> {{$duracion['duracion']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

    <div class="col-3">
                <div class="mb-3 row">
                <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Recurso:</label>
                <div class="col-lg-10 col-md-6 col-sm-12"> 
                <select name="id_recurso" class="form-control">
                    @foreach ($data["recursos"] as $recurso)
                    <option value="{{$recurso['id_recurso']}}"> {{$recurso['recurso']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

</div>  <!-- Fin de row -->

<div class="row">
    <div class="col-2">
                <div class="mb-3 row">
                <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Precio:</label>
                <div class="col-lg-12 col-md-6 col-sm-12"> 
                <input name="valor" value="{{old('valor')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>
</div>  <!-- Fin de Row -->

<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>
</div>

</form>
</div>
</div>

<div class="card">
<div class="card-header">
    <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Ver Precios Casas</a>
    <form class="form-inline" method="get">
        <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="search">
        <a href="{{'#'.$_GET['buscar']??''}}"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    </nav>
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">CASA NUMERO</th>
<th scope="col">OFRECIMIENTO</th>
<th scope="col">DURACION</th>
<th scope="col">RECURSO</th>
<th scope="col">PRECIO</th>
</tr>
</thead>
<tbody>
@php(session(['casaKey'=>'none']))
@foreach ($data["relacion"] as $relacion)
<tr>
@if (! (session('casaKey') == $relacion->casaNumero))
   <td id="{{ $relacion->casaNumero }}">{{ $relacion->casaNumero }}</td>
   @php(session(['casaKey'=>$relacion->casaNumero]))
@else 
    <td>{{ $relacion->casaNumero }}</td>
@endif
<td>{{ $relacion->ofrecimiento }}</td>
<td>{{ $relacion->duracion }}</td>
<td>{{ $relacion->recurso }}</td>
<td>{{ $relacion->valor}}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.preciosCasaForm.edit',['id_casa'=>$relacion->id_casa,'id_ofrecimiento'=>$relacion->id_ofrecimiento,
                                        'id_duracion'=>$relacion->id_duracion,'id_recurso'=>$relacion->id_recurso,'casaNumero'=>$relacion->casaNumero])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.preciosCasaForm.delete',['id_casa'=>$relacion->id_casa,'id_ofrecimiento'=>$relacion->id_ofrecimiento,
                                        'id_duracion'=>$relacion->id_duracion,'id_recurso'=>$relacion->id_recurso])}}" method="post" class="formulario_eliminar">
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