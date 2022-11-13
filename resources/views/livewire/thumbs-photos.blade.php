 
 <div class="col-lg-8">
        
        <div id="title_page_left_container" class="row">
            <p id="title_page_left"><strong> {{$titulo}}</strong> </p>
        </div>
        <div class="row">
            <div class="col-4" style="background-color:antiquewhite; padding:5px">
                
                <?php $comillas = '"'; ?>
                @if(count($imagenes_casas))
                    
                    <div class="row row-cols-2" style="border:2px solid  #000 ;background-color:white; margin-left:5px;margin-right:2px">
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
                @else
                 
                @endif
            
            </div>
    
            <div class="col-8 mt-1" style="background-color:antiquewhite">
                
                @if(count($imagenes_casas))   
                    <div class="card">
                        <img src="{{asset('storage/propiedades/'.$fotoNormal)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            @if($tipo!=2)
                            <h5 class="card-title">{{$residencial.'-'.$casaNumero}}</h5>
                            <p class="card-text"> {{$descripcion}}</p>

                            <a href="{{route('menu.inicio',['gestion'=>2,'id_propiedad'=>$id_propiedad])}}" class="btn btn-primary">Mas detalles...</a>
                            @else
                            <h5 class="card-title">{{$leyenda. ' en '. $casaNumero}}</h5>
                            @endif
                        </div>
                    </div>
                @else
                <div class="alert alert-success" role="alert">{{$piscina?1:0 || 1!=1 }} </div>
                <div class="alert alert-success" role="alert">{{"No hay propiedades destacadas"}} </div>
                @endif

                <!-- Características de la casa -->

                @if($tipo == 2 && count($imagenes_casas))  
                    <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Características de la propiedad</strong>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                
                    <tbody>
                    <tr>
                        <td>Plantas: {{ $imagenes_casas[0]->plantas}}</td>

                        <td>Area Construccion: {{ $imagenes_casas[0]->area_construccion}} mt2</td>
                    </tr>
                    <tr>
                       <td> Habitaciones: {{ $imagenes_casas[0]->habitaciones}}</td>

                       <td> Area Terreno: {{ $imagenes_casas[0]->area_terreno}} mt2</td>
                    </tr>
                    <tr>
                        <td>Baños: {{ $imagenes_casas[0]->banos }}</td>

                        <td>Año Construccion: {{ $imagenes_casas[0]->ano_construccion}}</td>
                    </tr>
                    <tr>
                        <td>Baño social: {{ $imagenes_casas[0]->bano_social?'Si':'No' }}</td>
                        <td>Aires Acond: {{ $imagenes_casas[0]->aires_acondicionado}}</td>
                    </tr>
                    <tr>
                        <td>Cuarto Doméstica: {{ $imagenes_casas[0]->cuartoDomestica?'Si':'No' }}</td>
                        <td>Abanicos: {{ $imagenes_casas[0]->abanicos_techo}}</td>
                    </tr>
                    <tr>
                        <td>Garage: {{ $imagenes_casas[0]->garage }}</td>
                        <td>Agua Caliente: {{ $imagenes_casas[0]->agua_caliente?'Si':'No' }}</td>
                    </tr>
                    <tr>
                        <td>Piscina: {{ $imagenes_casas[0]->piscina?'Si':'No' }}</td>
                        <td>Tanque Agua: {{ $imagenes_casas[0]->tanque_agua?'Si':'No' }}</td>
                    <tr>

                    <tr>
                        <td>Sist. Seguridad: {{ $imagenes_casas[0]->sistema_seguridad?'Si':'No' }}</td>
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
                                    <th scope="col">OFRECE</th>
                                    <th scope="col">CONTRATO</th>
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
                                        <td>{{ 'US$ ' . number_format($imagen_casa->valor)}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>

                     <!-- Agente Inmobiliario -->

                    <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Agente Inmobiliario</strong>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                
                    <tbody>
                        <tr>
                            <img src="{{asset('storage/agentes/'. $imagenes_casas[0]->foto_agente)}}">
                        </tr>
                    <tr>
                        <td>Nombre: {{ $imagenes_casas[0]->nombre_agente}}</td>

                        <td>Celular Tigo: {{ $imagenes_casas[0]->cel1}} </td>
                    </tr>
                    <tr>
                       <td> Celular Claro: {{ $imagenes_casas[0]->cel2}}</td>

                       <td> Email: {{ $imagenes_casas[0]->email}}</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    </div>
                @endif
                        
            </div>
        </div> 
</div>

