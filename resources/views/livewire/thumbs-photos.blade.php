
@if ((! $imagenes_casas->count()))  <!-- Formularios con resultados vacios -->

    <script>
        Swal.fire('Busqueda con resultado vacio');
    </script>
    @php(session(['ultimoQuery'=>'']))
    @php($swal = 1)
@endif

@if ((count($lastQuery) or $favoritos_casas->count()) && !isset($swal)  )
 <div id="top_resultados" class="col-lg-8 col-12">
        <div id="title_page_left_container" class="row">
            <p id="title_page_left"><strong> {{$titulo}}</strong> </p>
            <p style="color:gold;text-align:center">
                @if(!empty($arrayOpcionesForm))
                   {{$arrayOpcionesForm}}
                @endif
            </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12" style="background-color:antiquewhite;"> <!-- Columna thumbnails -->
                
                @php($comillas = '"')
                @if($imagenes_casas->count())
                    <!-- Destacados y Resultado de formularios en thumbnail -->
                    
                    <section class="card text-black bg-dark mb-3 mt-2 mx-auto"> 
                        <div class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>{{$titulo_thumbnail_lastQuery}}</strong></p>
                            <p class="subtitle_page_left"><small>{Clique las fotos para ampliarlas}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                            <div class="card-body bg-body px-0">
                                    @php(agregarThumbsToCarrousel($lastQuery,$titulo_thumbnail_lastQuery,"carousel1"))
                            </div> <!-- End Card Body -->

                    </section> <!-- End Card text-black de Destacados,Resulta de busqueda o Ambientes thumbnails-->
                    
                @endif

                @if ($favoritos_casas->count()) 
                    <!-- Favoritos thumbnails-->
                    <section class="card text-black bg-dark mb-3 mt-2 mx-auto">
                        <div class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>Mis Favoritos</strong></p>
                            <p class="subtitle_page_left"><small>{Clique las fotos para ampliarlas}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                            <div class="card-body bg-light">
                                @php(agregarThumbsToCarrousel($favoritos_casas,"Mis Favoritos",'carousel2'))
                            </div>  
                    </section>
                     
                @endif
            </div>  <!-- End container de los 2 grupos de thumbnails: Destacados/Formularios y Favoritos -->
            
            <div id="top_detalles" class="col-lg-8 col-12 mt-1" style="background-color:antiquewhite">  <!--columna de foto normal y caracteristicas -->
                            <section class="card">
                                <div class="card-body">
                                   <!-- inicio del carrousel para fotos normales -->
                                   <div id="carouselFotosNormales" class="carousel" data-bs-ride="carousel">
                                       <div class="carousel-indicators"> 
                                            
                                            @for($i=0;$i<$imagenes_casas->count();$i++)
                                                @if ($i==0)
                                                    <button id="carouselFotosNormales{{$imagenes_casas[$i]->id_casa}}" type="button" data-bs-target="#carouselFotosNormales" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
                                                @else
                                                    <button id="carouselFotosNormales{{$imagenes_casas[$i]->id_casa}}" type="button" data-bs-target="#carouselFotosNormales" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i}}"></button>
                                                @endif
                                            @endfor
                                            
                                       </div> 
                                        <div class="carousel-inner">
                                            @php($primerItem = true)
                                            @php($imagenes_casas_array = $carrusel=='carousel1' || ($carrusel=='carousel2' && $gestion==2)?$imagenes_casas:$favoritos_casas)
                                            
                                            @foreach($imagenes_casas_array as $imagen_casa)
                                               @if($gestion!=2)
                                                    @if ($imagen_casa->id_casa == $id_propiedad)
                                                    <div class="carousel-item active">
                                                    @else
                                                    <div class="carousel-item"> 
                                                    @endif
                                                @else
                                                    @if ($primerItem)
                                                        <div class="carousel-item active">
                                                        @php($primerItem = false)
                                                        @else
                                                        <div class="carousel-item"> 
                                                        @endif
                                                    @endif
                                                
                                                <!-- inicio de la muestra de la foto normal sin carrousel -->
                                                <img src="{{asset('storage/propiedades/'. $imagen_casa->foto_normal)}}" class="card-img-top" alt="...">
                                                <div id="procedencia">
                                                    {{$titulo_en_foto_normal}}
                                                </div>
                                               
                                                @if($gestion!=2) 
                                                    <h5 class="card-title">{{$imagen_casa->residencial.'-'.$imagen_casa->casaNumero}}</h5>
                                                    <p class="card-text"> {{$imagen_casa->descripcion}}</p>
                                                
                                                    <a class="btn btn-primary" href="{{route('menu.inicio',[2,$imagen_casa->id_casa,$arrayOpcionesForm])}}" role="button">Mas detalles...</a>
                                                @else
                                                    <p class="card-title">
                                                       
                                                    <strong>{{$imagen_casa->leyenda. ' en '. $imagen_casa->casaNumero}}</strong> </p>
                                                    @if(Auth::check())
                                                        <span class="d-block p-1 bg-primary text-white rounded-start">
                                                            <p><button onclick="alertaMensaje('{{$accionFav}}')" data-toggle="tooltip"
                                                                data-placement="bottom" 
                                                                title="{{buscarFavorito($imagen_casa->id_casa,$this->id_usuario)?'Borrar de Mis Favoritos':'Agregar a Mis Favoritos'}}"
                                                                type="button" wire:click="accionFavorito({{$comillas.$imagen_casa->id_casa.$comillas}})" 
                                                                name="buscarFavoritos" id="buscarFavoritos"
                                                                class="btn {{buscarFavorito($imagen_casa->id_casa,$this->id_usuario)?'btn-danger':'btn-secondary'}}">
                                                                <i class="bi bi-house-fill"></i>
                                                                </button> &#10232; Agregar/Borrar en lista Favoritos
                                                            </p>
                                                        </span>
                                                    @endif
                                                @endif

                                                <!-- fin de la muestra de la foto normal sin carrousel -->
                                            </div>  <!-- end div item carrousel -->
                                            @endforeach
                                    </div>  <!-- end div inner  carrousel  -->
                                    <button style="height: 350px;" class="carousel-control-prev" type="button" data-bs-target="#carouselFotosNormales" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button style="height: 350px;" class="carousel-control-next" type="button" data-bs-target="#carouselFotosNormales" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    </div> <!-- fin del carrousel fotos normales -->
                                    
                                </div>  <!-- end div card body -->

                            </section>
                            <!-- Carousel de thumbnail  abajo de la foto normal 
                            @if ($gestion==2 )
                                <section id="top_detalles" class="card text-black bg-dark mb-3 mt-2 mx-auto"> 
                                    <div class="card-header text-white" style="text-align:center;height:4.5em">
                                        <p id="title_page_left"><strong>{{$titulo_thumbnail}}</strong></p>
                                        <p class="subtitle_page_left"><small>{Clique las fotos para ampliarlas}</small></p>
                                        <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                                    </div>
                                    <div class="card-body bg-body px-0">
                                       @php(agregarThumbsToCarrousel($imagenes_casas,'Ambientes de la propiedad','carousel3'))
                                    </div> 

                                </section> 
                            @endif  -->

                        <!-- Características de la casa -->

                        @if($gestion == 2 && $imagenes_casas->count())  
                            <section class="card mt-3 mb-3">
                                <div class="card-header">
                                    Características de la propiedad: <strong>Tipo: {{ $imagenes_casas[0]->subtipo}}</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-primary">
                                
                                    <tbody>
                                    <tr>
                                        <td><u>Plantas:</u> {{ $imagenes_casas[0]->plantas}}</td>

                                        <td><u>Area Construccion:</u> {{ $imagenes_casas[0]->area_construccion}} mt2</td>
                                    </tr>
                                    <tr>
                                    <td> <u>Habitaciones:</u> {{ $imagenes_casas[0]->habitaciones}}</td>

                                    <td> <u>Area Terreno:</u> {{ $imagenes_casas[0]->area_terreno}} mt2</td>
                                    </tr>
                                    <tr>
                                        <td><u>Baños:</u> {{ $imagenes_casas[0]->banos }}</td>

                                        <td><u>Año Construccion:</u> {{ $imagenes_casas[0]->ano_construccion}}</td>
                                    </tr>
                                    <tr>
                                        <td><u>Baño social:</u> {{ $imagenes_casas[0]->bano_social?'Si':'No' }}</td>
                                        <td><u>Aires Acond:</u> {{ $imagenes_casas[0]->aires_acondicionado}}</td>
                                    </tr>
                                    <tr>
                                        <td><u>Cuarto Doméstica:</u> {{ $imagenes_casas[0]->cuartoDomestica?'Si':'No' }}</td>
                                        <td><u>Abanicos:</u> {{ $imagenes_casas[0]->abanicos_techo}}</td>
                                    </tr>
                                    <tr>
                                        <td><u>Garage:</u> {{ $imagenes_casas[0]->garage }}</td>
                                        <td><u>Agua Caliente:</u> {{ $imagenes_casas[0]->agua_caliente?'Si':'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td><u>Piscina:</u> {{ $imagenes_casas[0]->piscina?'Si':'No' }}</td>
                                        <td><u>Tanque Agua:</u> {{ $imagenes_casas[0]->tanque_agua?'Si':'No' }}</td>
                                    </tr>

                                    <tr>
                                        <td><u>Sist. Seguridad:</u> {{ $imagenes_casas[0]->sistema_seguridad?'Si':'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><u>Descripcion:</u> {{$imagenes_casas[0]->descripcion}}</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                 </div> <!--End card body -->
                            </section>  <!--End card -->
                        
                            <!-- Precios de renta o venta de la propiedad -->
                        
                            <section class="card mt-3 mb-3">
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
                                    <tr>
                                        <td colspan="4"><i> Los precios para contrato de renta: <u>anual</u>, <u>Semestral</u> o <u>mes</u> son pagos mensuales.</i></td> 
                                    </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </section>

                            <!-- Agente Inmobiliario -->

                            <section class="card mt-3 mb-3">
                                <div class="card-header">
                                    <strong>Agente Inmobiliario</strong>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table-striped table table-dark">
                                        <tr>
                                        <td><u>Nombre:</u> {{ $imagenes_casas[0]->nombre_agente}}</td>
                                            <td>
                                                <img src="{{asset('storage/agentes/'. $imagenes_casas[0]->foto_agente)}}">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td><u>Celular Tigo:</u> {{ $imagenes_casas[0]->cel1}}</td>
                                        </tr>
                                        <tr>
                                        <td><u>Celular Claro:</u> {{ $imagenes_casas[0]->cel2}}</td>
                                        </tr>
                                        <tr>
                                        <td><u>Email:</u> {{ $imagenes_casas[0]->email}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="3">
                                                <form id="emailForm" action="{{route('infoPropiedad',[$imagenes_casas[0]->email,$imagenes_casas[0]->nombre_agente])}}" method="get">
                                                    @csrf
                                                    <table class="table table-primary table-striped col-12">
                                                    <tr>
                                        <td colspan="2"> <p>Solicitar mayor informacion de: <strong>{{$casaNumero}}</strong></p>
                                                        <p>O detállanos la propiedad que buscas</p> </td>
                                        </tr>
                                                        <tr> 
                                                        <td colspan="2"><label for="from" >De:</label></td> </tr>
                                                        <tr>
                                                        <td colspan="2"> <input size="40" placeholder="Tu Direccion Email" type="email" required id="from" name="from" value="{{Auth::check()?Auth::user()->email:' '}}"></td>
                                                        </tr>
                                                        <tr>    
                                                        <td colspan="2"><label for="mensaje">Mensaje:</label></td> </tr>
                                                        <tr>
                                                        <td colspan="2"><textarea id="mensaje" required name="emailBody" rows="5" cols="45" placeholder="Mensaje"></textarea></td>
                                                        <input hidden name="casaNumero" value="{{$casaNumero}}">
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2"><input type="submit" name="submitEmail" value="Enviar" class="btn btn-primary">
                                                        <input type="reset" value="Limpiar" class="btn btn-primary"></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </section>
                        @endif
                                
                    </div>
        </div>  <!-- End Row -->

</div> <!-- End Columna 8 de derecha. -->
@else 
    @if ($gestion==1 or $gestion==3) <!-- si viene de cualquier formulario con resultados vacios -->
        @livewire('thumbs-photos',['gestion'=>0,'titulo'=>'Propiedades Destacadas'])
    @else
        @livewire('imagenes-grupo')
    @endif
@endif
