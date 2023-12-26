@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')

@if (isset($_GET['buscaInfo'])) 
   <script>
      window.location.href="{{'#'.strtoupper($_GET['buscaInfo'])}}";
    </script>
@endif

<div class="card mb-4">
    <div class="card-header">
        Crear Localizaciones
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.localizacionForm.store') }}" enctype="form-data">
            @csrf
            <div class="row">
                    <div class="col-6 form-floating">
                        <select id="id_ciudad" name="id_ciudad" class="form-select">
                            @foreach ($data["ciudades"] as $ciudad)
                                <option value="{{$ciudad['id_ciudad']}}">{{$ciudad['ciudad']}}</option>
                            @endforeach
                        </select> 
                         <label for="id_ciudad">Ciudad</label>
                    </div>

                    <div class="col-6 form-floating">
                        <input name="residencial" value="{{ old('residencial') }}" type="text" class="form-control">
                        <label for="residencial">Residencial</label>
                    </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="col-12" id="direccion" name="direccion">{{old('direccion')}} </textarea>
                        <label for="direccion">Direccion</label>
                    </div>
                </div>
            </div>
                
            <div class="row mt-2">
                 <div class="col-12">
                    <div class="form-floating">
                        <textarea class="col-12" name="descripcion" rows="10" >{{old('descripcion')}} </textarea>
                        <label for="descripcion">Descripcion</label>
                    </div>
                </div>
            </div>   
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>

        </form>
    </div>
</div>



<div class="card">
<div class="card-header">
     <!-- copiar desde aqui -->
    <div class="row">
        <div class="col-lg-8">
        VER LOCALIZACIONES:RESIDENCIALES
        </div>
        <nav class="navbar navbar-light bg-light col-lg-4">
            <div class="container-fluid">
                <form class="d-flex">
                    @csrf
                    <select name="buscaInfo" class="form-control">
                        <option value= " ">**Seleccione Residencial**</option>
                    @foreach ($data["localizaciones"] as $buscarFila)
                    <option value="{{$buscarFila->residencial}}"> {{$buscarFila->residencial}}</option>
                    @endforeach
                    </select> 
                    <button class="btn btn-outline-success mx-2" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div>
    <!-- hasta aqui -->
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">CIUDAD</th>
<th scope="col">RESIDENCIAL</th>
<th scope="col">DIRECCION</th>
<th scope="col">EDITAR</th>
<th scope="col">BORRAR</th>
</tr>
</thead>
<tbody>
<!--copiar desde aqui -->
@php(session(['searchKey'=>'none']))
@foreach ($data["relacion"] as $relacion)
@if (! (session('searchKey') == strtoupper($relacion->residencial)))
   <tr id="{{ strtoupper($relacion->residencial) }}">
   @php(session(['searchKey'=>strtoupper($relacion->residencial)]))
@else 
    <tr>
@endif
<!-- hasta aqui -->
<td>{{ $relacion->ciudad }}</td>
<td>{{ $relacion->residencial }}</td>
<td>{{ $relacion->direccion }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.localizacionForm.edit',['id'=>$relacion->id_localizacion])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.localizacionForm.delete',['id'=>$relacion->id_localizacion])}}" method="post" class="formulario_eliminar">
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