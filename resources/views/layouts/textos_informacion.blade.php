@extends('layouts/home')
@section('mainTitle','Informacion')

@section('cuerpo')

<div class="col-12 bg-primary">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto">
        <div class="card-header" style="text-align:center">
            <strong>Informacion </strong>
        </div>
        <div class="card-body">
        <p>{{$texto}}</p>
       
        <a class="btn btn-primary mt-3" href="{{route('menu.inicio',[2,session('idCasa')])}}" role="button">Retorna a la pagina anterior</a>
        </div>
    </div>
</div>

@endsection