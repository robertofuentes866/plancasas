<!DOCTYPE html>
<html>
<head>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{asset('css/app.css');}}" rel="stylesheet" type="text/css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <title>@yield('mainTitle','Plancasas Bienes Raices')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
</head>
<body>
<div class="row">
    <div class="col-lg-12 bg-dark text-white">
        <p class="placeholder-wave" id="headerP">PLANCASAS BIENES RAICES </p>
        <p class="placeholder-wave"><small id="smallHeader">Te ofrecemos un lugar Accesible, Cómodo y Seguro para vivir en familia.</small> </p>
    </div>
</div>
<div class="container">
    <div class="row my-3 ">
        <div class="col-lg-12 nav-justified">
        <ul class="nav nav-pills">
            <li class="nav-item">
                @if (Route::has('menu.inicio'))
                    <a class = "@yield('nav_link_inicio')" href="{{Route('menu.inicio')}}">INICIO</a>
                @endif
            </li>
           @guest
             <li class="nav-item">
                @if (Route::has('menu.crearUsuario'))
                    <a class = "@yield('nav_link_registrar')" href="{{Route('register')}}">REGISTRARSE</a>
                @endif
            </li>
            <li class="nav-item">
                @if (Route::has('menu.iniciarSesion'))
                    <a class = "@yield('nav_link_entrar')" href="{{Route('login')}}">ENTRAR</a>
                @endif
            </li>
            @else
             <li class="nav-item">
             <form id="logout" action="{{ route('logout') }}" method="POST">
                    <a role="button" class="nav-link active"
                    onclick="document.getElementById('logout').submit();">Salir</a>
                    @csrf
             </form>
             </li>
             @endguest
        </ul>
    </div>
        
</div>
 </div>
    <div class="container">
        <div class="row">
            @yield('cuerpo')
        </div>
    </div>
    <div class="row my-2">
        <div class="col-lg-12 bg-primary text-center">
            Copyright - <b>Managua</b> - <b>Nicaragua</b>
        </div>
    </div>
    @livewireScripts
</body>
</html>