@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="container" style="background-color:antiquewhite;">
    <div class="row" style="background-color:black; color:cornsilk">
        <p style="text-align:center">RESULTADO DE SU BUSQUEDA</p>
    </div>
    <div class="row">
        <div class="col-4 mt-2 mb-4">
            <?php $comillas = '"'; ?>
            @if(isset($imagenes_casas))
                <div class="row row-cols-2" style="border:2px solid #000 ;background-color:white; margin-left:5px;margin-right:2px">
                        @foreach($imagenes_casas as $imagen_casa)
                            <figure wire:click="selectNormalImagen({{$comillas.$imagen_casa->foto_normal.$comillas}},
                                    {{$comillas.$imagen_casa->descripcion.$comillas}})"> 
                                <img class="img-thumbnail" style="padding: 5px"
                                    src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" 
                                    alt="Sierras Doradas" width="84" height="54">
                                <figcaption> {{$imagen_casa->residencial.' - '.$imagen_casa->casaNumero}} </figcaption>
                            </figure>
                            
                        @endforeach
                </div>
            @endif
        </div>
 
        <div class="col-8"> 
            @if (isset($fotoNormal))
                <div class="card">
                        <img src="{{asset('storage/propiedades/'.$fotoNormal)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Propiedad Seleccionada</h5>
                            <p class="card-text"> {{$descripcion}}</p>
                            <a href="#" class="btn btn-primary">Mas detalles...</a>
                        </div>
                </div>
            @endif    
        </div> 
    </div>

</div>




    </div>
</div> <!-- End bg-primary -->

@endsection