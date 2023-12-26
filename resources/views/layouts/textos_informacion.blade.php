@extends('layouts/home')
@section('mainTitle','Informacion')

@section('nav_link_inicio','nav-link active')
@section('nav_link_registrar','nav-link')
@section('nav_link_entrar','nav-link')

@section('cuerpo')

<div class="col-12 bg-primary">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto">
        <div class="card-header text-center">
            <strong>Informacion </strong>
        </div>
        <div class="card-body">
        <p><?php echo nl2br($texto)?></p>
         
        <a class="btn btn-primary mt-3" href="{{route('casas-venta-renta',[2,session('idCasa')])}}" role="button">Retorna a la pagina anterior</a>
        </div>
    </div>
</div>

@endsection