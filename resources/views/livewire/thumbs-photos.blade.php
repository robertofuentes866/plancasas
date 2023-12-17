
@if ((! $imagenes_casas->count()))  <!-- Formularios con resultados vacios -->

    <script>
        Swal.fire('Busqueda con resultado vacio');
    </script>
    @php(session(['ultimoQuery'=>'']))
    @php($swal = 1)
@endif

@if (!isset($swal)  )
 <div id="top_resultados" class="col-lg-6 col-12 mt-2">
        <div id="title_page_left_container" class="row rounded-top">
        <header><h6><p id="title_page_left"><strong> {{$titulo}}</strong></p></h6></header>
            <p style="color:gold;text-align:center">
                @if(!empty($arrayOpcionesForm))
                   {{$arrayOpcionesForm}}
                @endif
            </p>
        </div>
        <div class="row">
            <div class="col-12 bg-dark"> <!-- Columna thumbnails -->
                
                @php($comillas = '"')
                @if($imagenes_casas->count())
                    <!-- Destacados y Resultado de formularios en thumbnail -->
                    
                    <section class="card text-black bg-dark mb-3 mt-2 mx-auto"> 
                        <div class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>{{$titulo_thumbnail_lastQuery}}</strong></p>
                            <p class="subtitle_page_left"><small>{Clique sobre las fotos}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                            <div class="card-body bg-body">
                                @if (count((array)$lastQuery))
                                    @php(agregarThumbsToCarrousel($lastQuery,$titulo_thumbnail_lastQuery,"carousel1"))
                                @endif
                            </div> <!-- End Card Body -->

                    </section> <!-- End Card text-black de Destacados,Resulta de busqueda o Ambientes thumbnails-->
                    
                @endif

                @if ($favoritos_casas->count()) 
                    <!-- Favoritos thumbnails-->
                    <section class="card text-black bg-dark mb-3 mt-2 mx-auto">
                        <div class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>Mis Favoritos</strong></p>
                            <p class="subtitle_page_left"><small>{Clique sobre las fotos}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                            <div class="card-body bg-light">
                            @if (count((array)$lastQuery))
                               @if ($favoritos_casas->count())
                                  @php(agregarThumbsToCarrousel($favoritos_casas,"Mis Favoritos",'carousel2'))
                                @endif
                            @endif
                            </div>  
                    </section>
                     
                @endif
            </div>  <!-- End container de los 2 grupos de thumbnails: Destacados/Formularios y Favoritos -->
            
            <div id="top_detalles" class="col-12 mt-1 bg-dark p-3">  <!--columna de foto normal y caracteristicas -->
                            <section class="card">
                                <div class="card-body">
                                   <!-- inicio del carrousel para fotos normales -->
                                   <div id="carouselFotosNormales" class="carousel carousel-fade slide" data-interval="false" data-ride="carousel">
                                            
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
                                                 
                                                <span class=procedencia>{{$titulo_en_foto_normal}}</span>
                                                <img src="{{asset(session('camino_mostrar').'/propiedades/'. $imagen_casa->foto_normal)}}" class="card-img-top" alt="{{'casa venta renta en '. $imagen_casa->residencial}}">
                                                
                                                @if($gestion!=2) 
                                                    <h5 class="card-title">{{$imagen_casa->residencial.'-'.$imagen_casa->casaNumero}}</h5>
                                                    <div class=" w-100 btn-group btn-group-sm mx-auto">
                                                        <a class="btn btn-primary" href="{{route('casas-venta-renta',[2,$imagen_casa->id_casa,$arrayOpcionesForm])}}" role="button">Mas fotos y precio de la propiedad</a>
                                                        <a class="btn btn-secondary" href="{{route('residencial',[$imagen_casa->localizacion_descripcion,$imagen_casa->id_casa,$imagen_casa->residencial])}}" role="button">Ver residencial</a>
                                                    </div>
                                                    
                                                @else
                                                    <p class="card-title">
                                                       
                                                    <strong>{{$imagen_casa->leyenda. ' en '. $imagen_casa->casaNumero}}</strong> </p>
                                                    
                                                    <a class="btn btn-primary mb-2" href="{{route('residencial',[$imagen_casa->localizacion_descripcion,$imagen_casa->id_casa,$imagen_casa->residencial])}}" role="button">Conozca el residencial</a>
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
                                    <a class="carousel-control-prev flechas" role="button" data-target="#carouselFotosNormales" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next flechas" role="button" data-target="#carouselFotosNormales" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
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
                                    <header><h6>Características de la propiedad: <strong>Tipo: {{ $imagenes_casas[0]->subtipo}}</strong></h6></header>
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
                                    <header><h6><strong>Precios de la propiedad</strong></h6></header>
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

                            <section class="card my-3">
                                <div class="card-header">
                                    <header><h6 class="display-8">Agente Inmobiliario - Envíanos un email aquí</h6></header>
                                </div>
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="bg-dark text-white row row-cols-2">
                                            <div class="col-9 col-lg-10 px-1 mx-0 ">
                                                <p class="">{{ $imagenes_casas[0]->nombre_agente}}</p>
                                                 
                                                @if(!empty($imagenes_casas[0]->cel1))
                                                <p class="">Celular Tigo:
                                                    <!-- codigo para incorporar whatsapp -->
                                                    <a class="cel_agentes" href="https://api.whatsapp.com/send/?phone={{$imagenes_casas[0]->cel1}}&text=En que te puedo ayudar?" target="_blank">
                                                        <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" class="boton">{{': '.$imagenes_casas[0]->cel1}}
                                                    </a>
                                                    <!-- End whatsapp -->
                                                </p> 
                                                @endif

                                                @if(!empty($imagenes_casas[0]->cel2))
                                                    <p>Celular Claro:
                                                            <!-- codigo para incorporar whatsapp -->
                                                            <a class="cel_agentes" href="https://api.whatsapp.com/send/?phone={{$imagenes_casas[0]->cel2}}&text=En que te puedo ayudar?" target="_blank">
                                                                <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" class="boton">{{': '.$imagenes_casas[0]->cel2}}
                                                            </a>
                                                            <!-- End whatsapp -->
                                                    </p>
                                                @endif
                                                <p class="">Email: {{ $imagenes_casas[0]->email}}</p>
                                            </div>
                                            <div class="col-3 col-lg-2 overflow-hidden">
                                                <img src="{{asset(session('camino_mostrar').'/agentes/'. $imagenes_casas[0]->foto_agente)}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bg-info">
                                                <p class="my-0">Solicitar mayor informacion de: <strong>{{$casaNumero}}</strong></p>
                                                <p class="my-0">O detállanos la propiedad que buscas</p>
                                            </div>
                                            <div class="bg-info bg-gradient col py-2">
                                                <form id="emailForm" action="{{route('infoPropiedad',[$imagenes_casas[0]->email,$imagenes_casas[0]->nombre_agente])}}" method="get">
                                                    @csrf
                                                    <div class="input-group my-2">
                                                        <label class="input-group-text" for="from" >De:</label>
                                                        <input class="form-control" placeholder="Tu Direccion Email" type="email" required id="from" name="from" value="{{Auth::check()?Auth::user()->email:' '}}">
                                                    </div>
                                                    <div class="my-2">
                                                        <textarea class="w-100 rounded" rows="5" id="mensaje" required name="emailBody" placeholder="Mensaje" ></textarea>
                                                        
                                                    </div>
                                                    <input hidden name="casaNumero" value="{{$casaNumero}}">
                                                    <div class="w-100 btn-group btn-group-lg">
                                                        <button type="submit" name="submitEmail" class="btn btn-primary">Enviar</button>
                                                        <button type="reset"class="btn btn-secondary">Limpiar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                                
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
