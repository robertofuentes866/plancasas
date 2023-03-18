@extends('layouts/home')
@section('mainTitle','Residencial')

@section('cuerpo')

<div class="col-lg-4 col-12 bg-primary">  <!-- Primera columna, la del formulario Residencial/Condonimio -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
        <div class="card-header" style="text-align:center">
            <strong>Residencial/Condominio </strong>
        </div>
        <div class="card-body">
        <p>{{$descripcion}}</p>
        
        <a class="btn btn-primary mt-3" href="{{route('casas-venta-renta',[2,$id_casa])}}" role="button">Retornar a la pagina anterior</a>
        </div>
    </div>
</div>

<div class="col-lg-8 col-12 bg-secondary">
    
    <figure class="figure">
        <img width="300" src="{{asset(session('camino_mostrar').'/residenciales/'.strtolower($residencial).'1.jpg')}}" class="img-thumbnail" alt="">
        
    </figure>

    <figure class="figure">
        <img width="300" src="{{asset(session('camino_mostrar').'/residenciales/'.strtolower($residencial).'2.jpg')}}" class="img-thumbnail" alt="">
        
    </figure>

    <figure class="figure">
        <img width="300" src="{{asset(session('camino_mostrar').'/residenciales/'.strtolower($residencial).'3.jpg')}}" class="img-thumbnail" alt="">
        
    </figure>

    <figure class="figure">
        <img width="300" src="{{asset(session('camino_mostrar').'/residenciales/'.strtolower($residencial).'4.jpg')}}" class="img-thumbnail" alt="">
        
    </figure>
    
</div>
    

@endsection