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
            <div id="carrusel1" class="col-12 bg-dark"> <!-- Columna thumbnails -->
                
                @php($comillas = '"')
                @if($imagenes_casas->count())
                    <!-- Destacados y Resultado de formularios en thumbnail -->
                    
                    <section  class="card text-black bg-dark mb-3 mt-2 mx-auto"> 
                        <div class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>{{$titulo_thumbnail_lastQuery}}</strong></p>
                            <p class="subtitle_page_left"><small>{Clique sobre las fotos}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                        <div class="card-body bg-body">
                            @if (count((array)$lastQuery))
                                @php(agregarThumbsToCarrousel($lastQuery,$titulo_thumbnail_lastQuery,"carousel1",$paginaCarousel1))
                            @endif
                        </div> <!-- End Card Body -->

                    </section> <!-- End Card text-black de Destacados,Resulta de busqueda o Ambientes thumbnails-->
                    
                @endif

                @if ($favoritos_casas->count()) 
                    <!-- Favoritos thumbnails-->
                    <section  class="card text-black bg-dark mb-3 mt-2 mx-auto">
                        <div id="carrusel2" class="card-header text-white" style="text-align:center;height:5em">
                            <p id="title_page_left"><strong>Mis Favoritos</strong></p>
                            <p class="subtitle_page_left"><small>{Clique sobre las fotos}</small></p>
                            <p class="subtitle_page_left"><small>{Rotar usando las flechas}</small></p>
                        </div>
                        <div class="card-body bg-light">
                            @if (count((array)$lastQuery))
                            @if ($favoritos_casas->count())
                                @php(agregarThumbsToCarrousel($favoritos_casas,"Mis Favoritos",'carousel2',$paginaCarousel2))
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
                    <div id="carouselFotosNormales" class="carousel carousel-fade slide" data-bs-interval="false" data-bs-ride="carousel" data-bs-touch="true">
                            
                        <div class="carousel-inner">
                            @php($primerItem = true)

                            @foreach($caracteristicas_propiedad as $imagen_casa)
                                @php($YaEsFavorito = buscarFavorito($imagen_casa->id_casa,$this->id_usuario) )
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
                                <img src="{{asset(session('camino_mostrar').'/propiedades/'. $imagen_casa->foto_normal)}}" class=" img-fluid" alt="{{'casa venta renta en '. $imagen_casa->residencial}}">
                                
                                    <p class="card-title">
                                        
                                    <strong>{{$imagen_casa->leyenda. ' en '. $imagen_casa->casaNumero}}</strong> </p>
                                                    
                                {{-- href="{{route('residencial',[$imagen_casa->id_localizacion,$imagen_casa->id_casa])}}" --}}
                                    
                                    @if(Auth::check())
                                        <span class="d-block p-1 bg-primary text-white rounded-start">
                                            <p><button data-bs-toggle="tooltip"
                                                data-placement="bottom" 
                                                title="{{$YaEsFavorito?'Borrar de mi lista Favoritos':'Agregar a mi lista Favoritos'}}"
                                                type="button" wire:click="accionFavorito({{$comillas.$imagen_casa->id_casa.$comillas}})" 
                                                name="buscarFavoritos" id="buscarFavoritos"
                                                class="btn {{$YaEsFavorito?'btn-danger':'btn-secondary'}}">
                                                <i class="bi bi-house-fill"></i>
                                                </button> &#10232; {{$YaEsFavorito?'Borrar de ':'Agregar a '}} mi lista Favoritos
                                            </p>
                                        </span>
                                    @endif
                                

                                <!-- fin de la muestra de la foto normal sin carrousel -->
                            </div>  <!-- end div item carrousel -->
                            @endforeach

                        </div>  <!-- end div inner  carrousel  -->

                    
                    <a role="button" data-bs-toggle="offcanvas" href="#offcanvasResidencial" onclick="offcanvasResidencialFunction({{$imagen_casa->id_localizacion}},{{$imagen_casa->id_casa}})" class="btn btn-primary my-2" role="button">Conozca el residencial</a>

                        <a class="carousel-control-prev flechas" role="button" data-bs-target="#carouselFotosNormales" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next flechas" role="button" data-bs-target="#carouselFotosNormales" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> <!-- fin del carrousel fotos normales -->
                    
                </div>  <!-- end div card body -->

                <div class="offcanvas offcanvas-end visible" tabindex="-1" id="offcanvasResidencial" aria-labelledby="offcanvasLabel">
                        <div class="offcanvas-header bg-dark text-white rounded-bottom">
                            <h5 class="offcanvas-title" id="offcanvasLabel">Residencial</h5>
                            <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" title="Cerrar"></button>
                        </div>
                        <div id="offcanvasResult" class="offcanvas-body p-5">

                        <button id="cierre" type="button" class="btn-close text-reset btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close" title="Cerrar"></button>
                            <h3 style="font-family: 'Julius Sans One'" id="h3" class="offcanvas-title my-3"></h3>
                            <p class="text-muted" id="parraf1"></p>
                            <div id="imagenes_residencial" class="img-thumbnail mt-4 ">
                                <div class="row row-cols-1 g-3">
                                    <img width="100%" src="" alt="">
                                <img  width="100%" src="" alt="">
                                <img  width="100%" src="" alt="">
                                <img  width="100%" src="" alt="">
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

            </section>
                           

                        <!-- Características de la casa -->
                       
                        @if($caracteristicas_propiedad->count())  
                            <section class="card mt-3 mb-3">
                                <div class="card-header">
                                    <header><h6>Características de la propiedad: <strong>Tipo: {{ $caracteristicas_propiedad[0]->subtipo}}</strong></h6></header>
                                </div>
                                <div class="card-body">
                                    
                                        <ul class="list-group">
                                            <div class="row row-cols-2 g-0">
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1">
                                                         Plantas 
                                                         <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->plantas}}</span> </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center px-1"> Area Constr <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->area_construccion}} mt2</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center px-1"> Habitaciones <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->habitaciones}}</span> </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center px-1"> Area terreno <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->area_terreno}} mt2</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center px-1"> Baños <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->banos}}</span> </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center px-1"> Año Constr <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->ano_construccion}}</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Baño social 
                                                    @if($caracteristicas_propiedad[0]->bano_social)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif</li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Aire Acond <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->aires_acondicionado}}</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Cuarto domést 
                                                    @if($caracteristicas_propiedad[0]->cuartoDomestica)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif 
                                                </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1" >Abanicos <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->abanicos_techo}}</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Agua caliente 
                                                    @if($caracteristicas_propiedad[0]->agua_caliente)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Garage <span class="badge rounded-pill bg-info">{{ $caracteristicas_propiedad[0]->garage}}</span> </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Piscina
                                                    @if($caracteristicas_propiedad[0]->piscina)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif
                                                    </li>
                                                </div>
                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Tanque agua 
                                                    @if($caracteristicas_propiedad[0]->tanque_agua)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif </li>
                                                </div>

                                                <div class="col">
                                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-1"> Sist. Seg 
                                                    @if($caracteristicas_propiedad[0]->sistema_seguridad)
                                                        <span class="badge rounded-pill bg-info">Si</span>
                                                    @else
                                                       <span class="badge rounded-pill bg-danger">No</span>
                                                    @endif </li>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>  <!-- End card body -->

                                    <div class="card-footer">
                                        <p> {{$caracteristicas_propiedad[0]->descripcion}}</p>
                                    </div>
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
                                    @foreach($caracteristicas_propiedad as $imagen_casa)
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

                            <section class=" card my-3 card-agente">
                                <div class="card-header">
                                    <header><h6 class=" display-8">Agente Inmobiliario-Envíanos email aquí</h6></header>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="info-agente">
                                            <div class="foto-agente">
                                                <img src="{{asset(session('camino_mostrar').'/agentes/'. $caracteristicas_propiedad[0]->foto_agente)}}">
                                            </div>
                                            <div id="contacto-agente" class="contacto-agente">
                                                <div class="nombre">
                                                    <span class="fas fa-envelope"></span>
                                                    <span>{{ $caracteristicas_propiedad[0]->nombre_agente}}</span>
                                                </div>
                                                @if(!empty($caracteristicas_propiedad[0]->cel1))
                                                    <div class="celular1">
                                                        <span>Tigo</span> 
                                                        <span>
                                                            <!-- codigo para incorporar whatsapp -->
                                                            <a class="cel_agentes" href="https://api.whatsapp.com/send/?phone={{$caracteristicas_propiedad[0]->cel1}}&text=En que te puedo ayudar?" target="_blank">
                                                                <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" class="boton">{{': '.$caracteristicas_propiedad[0]->cel1}}
                                                            </a>
                                                            <!-- End whatsapp -->
                                                        </span>
                                                    </div>
                                            
                                                @endif

                                                @if(!empty($caracteristicas_propiedad[0]->cel2))
                                                    <div class="celular2">
                                                        <span>Claro</span> 
                                                        <span>
                                                            <!-- codigo para incorporar whatsapp -->
                                                            <a class="cel_agentes" href="https://api.whatsapp.com/send/?phone={{$caracteristicas_propiedad[0]->cel2}}&text=En que te puedo ayudar?" target="_blank">
                                                                <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" class="boton">{{': '.$caracteristicas_propiedad[0]->cel2}}
                                                            </a>
                                                            <!-- End whatsapp -->
                                                        </span>
                                                    </div>
                                                @endif

                                                <div class="email">
                                                    <span class="fas fa-envelope"></span>
                                                    <span>{{ $caracteristicas_propiedad[0]->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="form-encabezado">
                                                <span>Solicitar mayor informacion de: <strong>{{$casaNumero}}</strong></span>
                                                <span><small>O detállanos la propiedad que buscas</small> </span>
                                            </div>
                                            <div class="form-cuerpo">
                                                <form id="emailForm" action="{{route('infoPropiedad',[$caracteristicas_propiedad[0]->email,$caracteristicas_propiedad[0]->nombre_agente])}}" method="get">
                                                    @csrf
                                                    <div class="input-dato w-70">
                                                        <span>Tu Email</span>
                                                        <input type="email" required id="from" name="from" value="{{Auth::check()?Auth::user()->email:' '}}">
                                                        
                                                    </div>
                                                    <div class="input-dato w-70">
                                                        <span>Mensaje</span>
                                                        <textarea class="w-100 id="mensaje" required name="emailBody"></textarea>
                                                        
                                                    </div>
                                                    <input hidden name="casaNumero" value="{{$casaNumero}}">
                                                    <div class="w-70 btn-group btn-group-sm botones-agente">
                                                        <button type="reset"class="btn btn-secondary">Limpiar</button>
                                                        <button type="submit" name="submitEmail" class="btn btn-primary">Enviar</button>
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
  
    @if ($gestion==1 or $gestion==2 or $gestion==3) <!-- si viene de cualquier formulario con resultados vacios -->
        @livewire('thumbs-photos',['gestion'=>0,'titulo'=>'Propiedades Destacadas'])
    @else
        @livewire('imagenes-grupo')
    @endif
@endif
<script>
     $('#carousel1').carousel('<?php echo $paginaCarousel1?>');
 </script>  