<div class="container">
<div class="row row-cols-2">
@foreach($imagenes_casas as $imagen_casa)
  <div class="col">
    <figure> 
        <img class="img-thumbnail" style="padding: 5px;" src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" alt="Sierras Doradas" width="84" height="54">
        <figcaption> {{$imagen_casa->residencial.' - '.$imagen_casa->casaNumero}} </figcaption>
    </figure>
  </div>
@endforeach    
</div>
</div>

