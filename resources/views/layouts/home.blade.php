<!DOCTYPE html>
<html>
<head>

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

        function changeValueRange1(val){
            document.getElementById("Range1Val").innerHTML='US$ '+val;
            document.getElementById("Range2").min =val;
        }

        function changeValueRange2(val){
            if (document.getElementById("Range1Val").nodeValue < val) {
                 document.getElementById("Range2Val").innerHTML='US$ '+val;
            }
        }

        function ajustarPrecios(val){
           
            if (val==1) { 
                $("#Range1").attr("min",1000);
                $("#Range1").attr("max",500000);
                $("#Range1").attr("step",1000);
                $("#Range2").attr("min",1000);
                $("#Range2").attr("max",500000);
                $("#Range2").attr("step",1000);
                document.getElementById("Range1Val").innerHTML='US$ '+1000;
                document.getElementById("Range2Val").innerHTML='US$ '+500000;
            } else {
                $("#Range1").attr("min",100);
                $("#Range1").attr("max",3000);
                $("#Range1").attr("step",100);
                $("#Range2").attr("min",100);
                $("#Range2").attr("max",3000);
                $("#Range2").attr("step",100);
                document.getElementById("Range1Val").innerHTML='US$ '+100;
                document.getElementById("Range2Val").innerHTML='US$ '+3000;
            }
        }

        $('#flechas').trigger('click');

        function muestraCasa(id) {
            
            $('#carouselFotosNormales'+id).trigger('click');
        }

        
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
            <p class="placeholder-wave" id="headerP">VISUAL HOME REAL ESTATE NICARAGUA </p>
            <p class="placeholder-wave"><small id="smallHeader">Te ofrecemos un lugar Accesible, Cómodo y Seguro para vivir en familia.</small> </p>

        </header>
    </div>
</div>
<nav class="container">
    <div class="row my-2 ">
        <div class="col-12 nav-justified">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                            
                            <a class = "@yield('nav_link_inicio')" href="{{Route('menu.inicio')}}">INICIO</a>
                           
                    </li>
                @guest
                    <li class="nav-item">
                            <a class = "@yield('nav_link_registrar')" href="{{Route('register')}}">REGISTRARSE</a>
                    </li>
                    <li class="nav-item">
                            <a class = "@yield('nav_link_entrar')" href="{{Route('login')}}">ENTRAR</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link"
                            onclick="document.getElementById('logout').submit();"><strong>{{Auth::user()->name}} {Salir}</strong></a>
                            @csrf
                    </form>
                    </li>
                    @endguest
                </ul>
        </div>
        
    </div>
</nav>


<main class="container">
    <div class="row">
        @yield('cuerpo')
        
    </div>
</main>
<!-- codigo para incorporar whatsapp -->
<div class="whatsapp">
   <a href="https://api.whatsapp.com/send/?phone=50589634969" target="_blank">
    <img src="{{asset('storage/imagenes_app/whatsapp-logo.png')}}" class="boton">
   </a>
</div>
<!-- End whatsapp -->
<foot class="container">
    <div class="row my-2">
        <div class="col-12 bg-primary text-center">
            Copyright - <b>Managua</b> - <b>Nicaragua</b>
        </div>
    </div>
</foot>
@livewireScripts
@yield('js')

</body>
</html>