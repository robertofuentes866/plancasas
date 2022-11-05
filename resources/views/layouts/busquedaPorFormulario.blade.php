@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-6 bg-primary">
<div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
  RESULTADO DE SU BUSQUEDA
</div>
    <div class="container">
        <div class="row row-cols-2">
            
            @foreach($imagenes_casas as $imagen_casa)
                <div class="col">
                    <figure> 
                        <img class="img-thumbnail" style="padding: 5px; display:block;margin:auto" src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" alt=" " width="84" height="54">
                        <figcaption> {{$imagen_casa->residencial.' - '.$imagen_casa->casaNumero}} </figcaption>
                    </figure>
                </div>
            @endforeach    
        </div>
    </div>
</div> <!-- End bg-primary -->


<div class="col-lg-6 bg-secondary">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">   
            <figure class="figure" >
            <img src="{{asset('storage/propiedades/'.$imagenes_casas[0]->foto_normal)}}" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption"> {{$imagenes_casas[0]->residencial.' - '.$imagenes_casas[0]->casaNumero}} </figcaption>
            </figure>
        </div> 
    </div>
    <div class="row">
        <div class="card mb-3">
            <div class="col-lg-9 col-md-6 col-sm-12 mx-auto"> 
                    {{$imagenes_casas[0]->descripcion}}
            </div>
        </div>
    </div>
    </div>
</div>

@endsection