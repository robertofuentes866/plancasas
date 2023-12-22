<!DOCTYPE html>
<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{asset('css/app.css');}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <title>@yield('mainTitle','Visual Home Administracion')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="row">
    <div class="col-lg-12 bg-dark text-white">
        <p class="placeholder-wave" id="headerP">Visual Home - Panel Administracion </p>
        <p class="placeholder-wave"><small id="smallHeader">Te ofrecemos un lugar Accesible, Cómodo y Seguro para vivir en familia.</small> </p>
    </div>
</div>
<div class="container">
    <div class="row my-2 ">
       <div class="col-lg-12 nav-justified">
             @if (auth()->guard('admin')->check())
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <form id="logout" action="{{ route('logOutAdmin') }}" method="POST">
                                <a role="button" class="nav-link"
                                onclick="document.getElementById('logout').submit();">Salir</a>
                                @csrf
                        </form>
                    </li>
                </ul>
            @endif
        </div> 
        
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        @yield('cuerpo')
    </div>
</div>

<div class="row my-2">
    <div class="col-lg-12 bg-primary text-center">
        &copy; 2023 - <b>Managua</b> - <b>Nicaragua</b>
    </div>
</div>
@yield('js')
</body>
</html>