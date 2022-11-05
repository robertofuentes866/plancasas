 <div class="col-lg-4 bg-secondary">
        <div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
            PROPIEDADES DESTACADAS 
        </div>
        
        <div class="row row-cols-2">
          
            <?php $comillas = '"'; ?>
            @if(isset($imagenes_casas))
                @foreach($imagenes_casas as $imagen_casa)
                      <figure> 
                          <button type="button"
                            wire:click="selectNormalImagen({{$comillas.$imagen_casa->foto_normal.$comillas}},
                              {{$comillas.$imagen_casa->descripcion.$comillas}})">
                              Clique Aquí</button>
                        
                          <img class="img-thumbnail" style="padding: 5px; display:block;margin:auto"
                            src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" 
                            alt="Sierras Doradas" width="84" height="54">
                          <figcaption> {{$imagen_casa->residencial.' - '.$imagen_casa->casaNumero}} </figcaption>
                      </figure>
                    
                @endforeach
            @endif
            {{$fotoNormal}}
        </div>
</div>

<div class="col-lg-4 bg-primary">
    <div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
         PATROCINIO
         @if(!empty($fotoNormal))
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/propiedades/'.$fotoNormal)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Propiedad Seleccionada</h5>
                  <p class="card-text"> {{$descripcion}}</p>
                  <a href="#" class="btn btn-primary">Mas detalles...</a>
                </div>
            </div>
        @endif
    </div>
    {{$fotoNormal}}
</div>