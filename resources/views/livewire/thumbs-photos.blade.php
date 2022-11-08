 
 <div class="col-lg-8">
        <div class="row" style="background-color:#000;">
            <p style="text-align:center;color:white"><strong> {{$titulo}}</strong> </p>
        </div>
        <div class="row">
            <div class="col-4" style="background-color:antiquewhite; padding:5px">
            
                <?php $comillas = '"'; ?>
                @if(isset($imagenes_casas))

                <div class="row row-cols-2" style="border:2px solid #000 ;background-color:white; margin-left:5px;margin-right:2px">
                        @foreach($imagenes_casas as $imagen_casa)
                       
                          @if (! propiedadIncluida($imagen_casa->id_casa,$imagen_casa->id_foto,$arrayProp))
                                <figure wire:click="selectNormalImagen({{$comillas.$imagen_casa->foto_normal.$comillas}},
                                        {{$comillas.$imagen_casa->descripcion.$comillas}},
                                        {{$comillas.$imagen_casa->residencial.$comillas}},
                                        {{$comillas.$imagen_casa->casaNumero.$comillas}},
                                        {{$comillas.$imagen_casa->id_casa.$comillas}},
                                        {{$comillas.$imagen_casa->leyenda.$comillas}} )"> 
                                    <img class="img-thumbnail" style="padding: 5px"
                                        src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" 
                                        alt="Sierras Doradas" width="84" height="54">
                                    <figcaption> {{$imagen_casa->leyenda}} </figcaption>
                                </figure>
                          @endif 
                        @endforeach
                </div>
                @endif
            
            </div>
    
            <div class="col-8 mt-1" style="background-color:antiquewhite">
                
                @if(isset($imagenes_casas))   
                    <div class="card">
                        <img src="{{asset('storage/propiedades/'.$fotoNormal)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            @if($tipo!=2)
                            <h5 class="card-title">{{$residencial.'-'.$casaNumero}}</h5>
                            <p class="card-text"> {{$descripcion}}</p>

                            <a href="{{route('menu.inicio',['gestion'=>2,'id_propiedad'=>$id_propiedad])}}" class="btn btn-primary">Mas detalles...</a>
                            @else
                            <h5 class="card-title">{{$leyenda}}</h5>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Características de la casa -->

                @if($tipo == 2)  
                    <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Características de la propiedad</strong>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                
                    <tbody>
                    <tr>
                        <td>Plantas: {{ $imagenes_casas[0]->plantas}}</td>

                        <td>Area Construccion: {{ $imagenes_casas[0]->area_construccion}}</td>
                    </tr>
                    <tr>
                       <td> Habitaciones: {{ $imagenes_casas[0]->habitaciones}}</td>

                       <td> Area Terreno: {{ $imagenes_casas[0]->area_terreno}}</td>
                    </tr>
                    <tr>
                        <td>Baños: {{ $imagenes_casas[0]->banos }}</td>

                        <td>Año Construccion: {{ $imagenes_casas[0]->ano_construccion}}</td>
                    </tr>
                    <tr>
                        <td>Baño social: {{ $imagenes_casas[0]->bano_social?'Si':'No' }}</td>
                    </tr>
                    <tr>
                        <td>Cuarto Doméstica: {{ $imagenes_casas[0]->cuartoDomestica?'Si':'No' }}</td>
                    </tr>
                    <tr>
                        <td>Garage: {{ $imagenes_casas[0]->garage }}</td>
                    </tr>
                    <tr>
                        <td>Piscina: {{ $imagenes_casas[0]->piscina?'Si':'No' }}</td>
                    <tr>
                    </tbody>
                    </table>
                    </div>
                    </div>

                    <!-- Precios de renta o venta de la propiedad -->

                    <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Precios de la propiedad</strong>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">OFRECIMIENTO</th>
                            <th scope="col">DURACION</th>
                            <th scope="col">RECURSO</th>
                            <th scope="col">PRECIO</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($imagenes_casas as $imagen_casa)
                        @if (! precioIncluido($imagen_casa->id_casa,$imagen_casa->id_ofrecimiento,
                                              $imagen_casa->id_duracion,$imagen_casa->id_recurso,$arrayProp))
                            <tr>
                                <td>{{ $imagen_casa->ofrecimiento}}</td>
                                <td>{{ $imagen_casa->duracion}}</td>
                                <td>{{ $imagen_casa->recurso}}</td>
                                <td>{{ $imagen_casa->valor}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>
                @endif
                        
            </div>
        </div> 
</div>

