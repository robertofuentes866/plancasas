<!DOCTYPE html>
<html>
<head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6XGEZPNVG8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6XGEZPNVG8');
</script>
<meta name="google-site-verification" content="uavcS11j8HEaLvzS-5TUEVttlk3hZZBeyllOx3fR5CY">
<meta name="description" content="Visual Home Nicaragua es un sitio web que ofrece casas y terrenos en venta o 
alquiler en el sector de Managua y carretera a Masaya.">
<meta name="keywords" content="venta de casas, renta de casas, alquiler de casas, alquiler en sierras doradas, alquiler de casas carretera a masaya, casas en alquiler a bajo precio, venta de casas en managua,
                               alquiler de casas en managua, busco alquiler de casas a bajo costo en managua, managua, nicaragua, casas en carretera a masaya, casas en managua, casas en jinotepe">


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{asset('css/app.css');}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

    <title>@yield('mainTitle','Visual Home Real Estate Nicaragua')</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles
    <script>
        function alertaMensaje(msg) {
            Swal.fire(msg);
        }
        
        
        $('#flechas').trigger('click');

        
    </script>
    <style>
      .jumbotron{
        height:310px;
        width:100%;
        background-position:center center;
        background-repeat:no-repeat;
        background-size:cover;
        background:contain;
        background-image: url({{asset(session('camino_mostrar').'/imagenes_app/encabezado.JPG')}});
      }
    </style>
    
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
  </symbol>
  <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
  </symbol>
  <symbol id="twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
  </symbol>
</svg>
@if (isset($viewData))
    @switch ($viewData['gestion'])
    
        @case(1)
        @case(3)
        <script>
            $(document).ready(function() {      
                    document.location.href = "#top_resultados";
                    });
        </script>
        @break

        @case (2)
        <script>
            $(document).ready(function() {      
                    document.location.href = "#top_detalles";
                    });
        </script>
        @break
    @endswitch
@endif
<div class="jumbotron jumbotron-fluid pt-0 mb-0">
    <div class="d-flex flex-column">
        <h1 class="m-0 display-6 fw-bolder text-bg-light ps-2 bg-opacity-75" style="font-size:1.2rem;">VISUAL HOME NICARAGUA - REAL ESTATE</h1>
        <p class="m-0 fst-italic fs-6 ps-2 text-bg-light rounded-bottom bg-opacity-75" style="font-size:3.5vw;">Te ofrecemos una propiedad Accesible, Cómoda y Segura para vivir en familia</p>
    </div>     
</div>
<!-- MENU PRINCIPAL -->
<div class="container-fluid">
    <div class="row">
<nav class="col-12 navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{Route('casas-venta-renta')}}"><img src="{{asset(session('camino_mostrar').'/imagenes_app/logo_visual_home.jpg')}}" alt="ventas y alquileres de casas en Managua y Carretera a Masaya" width="30" height="24" class="d-inline-block align-text-top rounded">
      Visual Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item mx-4">
        <a class = "@yield('nav_link_inicio')" href="{{Route('casas-venta-renta')}}">INICIO</a>
        </li>
        @guest
        <li class="nav-item mx-4">
        <a class = "@yield('nav_link_registrar')" href="{{Route('register')}}">CREA UNA CUENTA</a>
        </li>
        <li class="nav-item mx-4">
        <a class = "@yield('nav_link_entrar')" href="{{Route('login')}}">TIENES CUENTA AQUI?</a>
        </li>
        @else
        <li class="nav-item mx-4">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link"
                            onclick="document.getElementById('logout').submit();"><strong>{{Auth::user()->name}} {Salir}</strong></a>
                            @csrf
                    </form>
        </li>
        @endguest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consejos y mas...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('textos_informacion',['lo que somos.txt'])}}">Sobre nosotros</a></li>
            <li><a class="dropdown-item" href="{{route('textos_informacion',['lo que te ofrecemos.txt'])}}">Lo que te ofrecemos</a></li>

            <li class="dropdown-divider"></li><li>
                        <a class="dropdown-item" href="{{route('textos_informacion',['consejos_adquirir_casa.txt'])}}">Consejos para comprar casa</a>
                        </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hágalo usted mismo
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('hagalo-usted-mismo',['manguera pantry.txt'])}}">Cambiar manguerita de lavamanos</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>

<!-- Fin Menu Principal -->

<main class="container-fluid">
    <div class="row bg-secondary py-1">
        @yield('cuerpo')
    </div>
</main>
<!-- codigo para incorporar whatsapp -->
<div class="whatsapp">
   <a href="https://api.whatsapp.com/send/?phone=50589634969" target="_blank">
    <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" alt="Logo de whatsapp" class="boton">
   </a>
</div>
<!-- End whatsapp -->
<footer class="container-fluid rounded-bottom py-3 mt-0 bg-dark text-white">

  <div class="row row-cols-lg-4 row-cols-md-3 row-cols-1 d-flex justify-content-evenly">
    <div class="col">
      <h4 class="display-8 fw-bold my-3 text-secondary">Casas en Venta y Alquiler</h4>
       <ul class="nav list-unstyled d-flex flex-column">
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/11" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Venta en Sierras Doradas</small>  </a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/12" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Venta en Sierras Doradas</small> </a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/13" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Venta en Villa Arahal</small></a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/14" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Venta o alquiler en Sierras Doradas</small></a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/15" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Alquiler en Villa Arahal</small></a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/16" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Alquiler en Palmetto</small></a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/casas-venta-renta/2/18" alt="Venta casa en Sierras Doradas Carretera a Masaya"><small>Alquiler en Sierras Doradas</small></a></li>
       </ul>  
    </div>

    <div class="col">
      <h4 class="display-8 fw-bold my-3 text-secondary">Textos informativos</h4>
       <ul class="nav list-unstyled d-flex flex-column">
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/textos_informacion/lo que somos.txt" alt="Lo que somos"><small>Lo que somos</small></a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/textos_informacion/lo que te ofrecemos.txt" alt="Lo que te ofrecemos"><small>Lo que te ofrecemos</small> </a></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/textos_informacion/consejos_adquirir_casa.txt" alt="Consejos adquirir casas"><small>Consejos para adquirir tu casa nueva</small></a></li>
          <li class="nav-item"><hr class="my-1"></li>
          <li class="nav-item"><a class="p-0 nav-link text-muted" href="https://visualhome.net/hagalo-usted-mismo/manguera pantry.txt" alt="Cambiar manguera lavaplatos"><small>Cambiar manguera del lavaplatos</small></a></li>
       </ul>  
    </div>

    <div class="col">
        <h4 class="display-8 fw-bold my-3 text-secondary">Otros enlaces</h4>
        <a class="me-3" href="http://instagram.com/visualhomenicaragua" target="_blank"><svg class="bi" width="32" height="32"><use xlink:href="#instagram"></svg></a>
        
        <a href="https://facebook.com/visualhomenicaragua" target="_blank"><svg class="bi" width="32" height="32"><use xlink:href="#facebook"></svg></a>
        

        <!-- <a href="http://instagram.com/visualhomenicaragua" target="_blank" ></a> 
        <img alt="enlace con cuenta instagram visual home nicaragua" width="30" src="{{asset(session('camino_mostrar').'/imagenes_app/logo_instagram.png')}}" ></a>
        <a class="mx-3" href="https://facebook.com/visualhomenicaragua" target="_blank" ><img alt="enlace con cuenta facebook visual home nicaragua" width="30" src="{{asset(session('camino_mostrar').'/imagenes_app/logo_facebook.png')}}" ></a> -->
    </div>
  </div>
</footer>
@livewireScripts
@yield('js')

</body>
</html>