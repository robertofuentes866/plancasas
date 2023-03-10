<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Visual Home Nicaragua es una herramienta de busqueda de casas y terrenos en venta o 
alquiler del sector inmobiliario de Nicaragua.">
<meta name="keywords" content="venta renta alquiler casa sierras doradas ganga carretera a masaya terrenos casas bajo precio bonita linda casa vivienda hogar">

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
    
</head>
<body>
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

<div class="container">
    <div class="row">
        <header id="encabezado" class="col-12 bg-dark text-white">
            <p class="placeholder-wave" id="headerP">VISUAL HOME <br> REAL ESTATE NICARAGUA </p>
            <p class="placeholder-wave"><small id="smallHeader">Te ofrecemos un lugar Accesible, Cómodo y Seguro para vivir en familia.</small> </p>
            
        </header>
    </div>
</div>
<!-- MENU PRINCIPAL -->
<div class="container">
    <div class="row">
<nav class="col-12 navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{asset(session('camino_mostrar').'/imagenes_app/logo_visual_home.jpg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top rounded">
      Visual Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item mx-4">
        <a class = "@yield('nav_link_inicio')" href="{{Route('menu.inicio')}}">INICIO</a>
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
      </ul>
    </div>
  </div>
</nav>
</div>
</div>

<!-- Fin Menu Principal -->

<main class="container">
    <div class="row">
        @yield('cuerpo')
        
    </div>
</main>
<!-- codigo para incorporar whatsapp -->
<div class="whatsapp">
   <a href="https://api.whatsapp.com/send/?phone=50589634969" target="_blank">
    <img src="{{asset(session('camino_mostrar').'/imagenes_app/whatsapp-logo.png')}}" class="boton">
   </a>
</div>
<!-- End whatsapp -->
<foot class="container">
    <div class="row my-2">
        <div class="col-12 bg-primary text-center">
            Copyright - <b>Managua</b> - <b>Nicaragua</b>
            <a class="mx-3" href="http://instagram.com/visualhomenicaragua" target="_blank" ><img width="30" src="{{asset(session('camino_mostrar').'/imagenes_app/logo_instagram.png')}}" ></a>
            <a class="mx-3" href="https://www.facebook.com/people/Visual-Home-Real-Estate-Nicaragua/100068429333347/" target="_blank" ><img width="30" src="{{asset(session('camino_mostrar').'/imagenes_app/logo_facebook.png')}}" ></a>
        </div>
    </div>
</foot>
@livewireScripts
@yield('js')

</body>
</html>