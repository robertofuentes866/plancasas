 
 <div class="col-lg-8">
        <div class="row" style="background-color:#000;">
            <p style="text-align:center;color:white"><strong> Propiedades Destacadas</strong> </p>
        </div>
        <div class="row">
            <div class="col-4" style="background-color:antiquewhite; padding:5px">
            
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
    
            <div class="col-8" style="background-color:antiquewhite">
                
                @if(!empty($fotoNormal))   
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

