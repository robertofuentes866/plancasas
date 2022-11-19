 
 @if ((! $imagenes_casas->count()) && ($tipo==1 or $tipo==3))  <!-- Formularios con resultados vacios -->

<script>
   Swal.fire('Busqueda con resultado vacio');
</script>
@php($swal = 1)
@endif


@if (($imagenes_casas->count() or $favoritos_casas->count()) && !isset($swal)  )
 <div class="col-lg-8">
        
        <div id="title_page_left_container" class="row">
            <p id="title_page_left"><strong> {{$titulo}}</strong> </p>
        </div>
        <div class="row">
            <div class="col-4" style="background-color:antiquewhite;"> <!-- Columna thumbnails -->
                
                @php($comillas = '"')
                @if($imagenes_casas->count())
                    <!-- Destacados o Resultado de busqueda en thumbnail -->
                    <div class="card text-black bg-dark mb-3 mt-2 mx-auto"> 
                        <div class="card-header text-white" style="text-align:center">
                           <strong>{{$titulo_thumbnail}}</strong>
                        </div>
                            <div class="card-body bg-light px-0">

                                    <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                                        
                                        <div class="carousel-inner">
                                                                       
                                            @foreach($imagenes_casas as $imagen_casa)
                                                @php(incrementaIndice($i_total))
                                                @if (!($i % 4))
                                                <div class="carousel-item {{$i==0?'active ':''}} row row-cols-2">
                                                  
                                                @endif  
                                                @if (! propiedadIncluida($imagen_casa->id_casa,$imagen_casa->id_foto,$arrayProp))
                                                        <div class="col" style=" float:right; height:120px;">
                                                        @php(incrementaIndice($i))
                                                        <figure  wire:click="selectNormalImagen({{$comillas.$imagen_casa->foto_normal.$comillas}},
                                                                {{$comillas.$imagen_casa->descripcion.$comillas}},
                                                                {{$comillas.$imagen_casa->residencial.$comillas}},
                                                                {{$comillas.$imagen_casa->casaNumero.$comillas}},
                                                                {{$comillas.$imagen_casa->id_casa.$comillas}},
                                                                {{$comillas.$imagen_casa->leyenda.$comillas}} )"> 
                                                            <img class="img-thumbnail" 
                                                                src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" 
                                                                alt=" " width="84" height="54">
                                                            <figcaption> {{$imagen_casa->leyenda}} </figcaption>
                                                        </figure>
                                                        </div>
                                                @endif 
                                                @if ( (!($i % 4)) or ($i_total >= $imagenes_casas->count()) )
                                                </div> 
                                                @endif
                                            @endforeach
                                        </div> <!-- End Inner --> 
                                        <button class="carousel-control-prev bg-dark ml-0" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next bg-dark mr-0" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>

                                    </div> <!-- End Main Carousel -->
                            
                            </div> <!-- End Card Body -->

                    </div> <!-- End Card text-black de Destacados o Ambientes thumbnails-->
                @endif

                @if ($favoritos_casas->count()) 
                    <!-- Favoritos thumbnails-->
                    <div class="card text-black bg-dark mb-3 mt-2 mx-auto">
                        <div class="card-header text-white" style="text-align:center">
                            <strong>Mis Favoritos </strong>
                        </div>
                            <div class="card-body bg-light">
                                <div id="container_favoritos" class="row row-cols-2"> <!-- favoritos-->
                                    
                                    @foreach($favoritos_casas as $favorito_casa) 
                                        @if (! propiedadIncluida($favorito_casa->id_casa,$favorito_casa->id_foto,$arrayFav))
                                            <figure wire:click="selectNormalImagen({{$comillas.$favorito_casa->foto_normal.$comillas}},
                                                    {{$comillas.$favorito_casa->descripcion.$comillas}},
                                                    {{$comillas.$favorito_casa->residencial.$comillas}},
                                                    {{$comillas.$favorito_casa->casaNumero.$comillas}},
                                                    {{$comillas.$favorito_casa->id_casa.$comillas}},
                                                    {{$comillas.$favorito_casa->leyenda.$comillas}} )"> 
                                                <img class="img-thumbnail" style="padding: 5px"
                                                    src="{{asset('storage/propiedades/'.$favorito_casa->foto_thumb)}}" 
                                                    alt="Sierras Doradas" width="84" height="54">
                                                <figcaption> {{$favorito_casa->leyenda}} </figcaption>
                                            </figure>
                                        @endif 
                                    @endforeach
                                </div>
                            </div>  
                    </div>
                     
                @endif
            </div>  <!-- End container de los 2 grupos de thumbnails: Destacados y Favoritos -->

           
            
                    <div class="col-8 mt-1" style="background-color:antiquewhite">  <!--columna de foto normal y caracteristicas -->
                            <div class="card">
                                <img src="{{asset('storage/propiedades/'.$fotoNormal)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    @if($tipo!=2)
                                    <h5 class="card-title">{{$residencial.'-'.$casaNumero}}</h5>
                                    <p class="card-text"> {{$descripcion}}</p>

                                    <a href="{{route('menu.inicio',['gestion'=>2,'id_propiedad'=>$id_propiedad])}}" class="btn btn-primary">Mas detalles...</a>
                                    
                                    @else
                                    <p class="card-title">
                                    @if(Auth::check())
                                        <button data-toggle="tooltip" data-placement="bottom" title="{{buscarFavorito($id_propiedad,$this->id_usuario)?'Borrar de Mis Favoritos':'Agregar a Mis Favoritos'}}" type="button" wire:click="accionFavorito({{$comillas.$id_propiedad.$comillas}})" name="buscarFavoritos" id="buscarFavoritos" class="btn {{buscarFavorito($id_propiedad,$this->id_usuario)?'btn-danger':'btn-secondary'}}"><i class="bi bi-house-fill"></i></button>
                                    @endif    
                                    <strong>{{$leyenda. ' en '. $casaNumero}}</strong>
                                    </p>
                                    @endif
                                    
                                </div>
                            </div>
                        
                            
                        

                        <!-- Características de la casa -->

                        @if($tipo == 2 && $imagenes_casas->count())  
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
        </div>  <!-- End Row -->

</div> <!-- End Columna 8 de derecha. -->
@else 
    @if ($tipo==1 or $tipo==3) 
        @livewire('thumbs-photos',['tipo'=>0,'titulo'=>'Propiedades Destacadas'])
    @else
        @livewire('imagenes-grupo')
    @endif
@endif
