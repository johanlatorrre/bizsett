<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


    <style>
        .active{
            color:#f9ae00;
            font-weight:bold;
        }
    </style>

  <!-- Tailwind CSS Link -->
  <link rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

  <!-- Fontawesome Link -->
  <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"/>
    <title>Static Template</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="main.css" />
  
    {{-- estilos del buscador --}}
  <style>
    .round {

      background-color: #fff;
      height: auto;
      margin: 0 auto 15px auto;
      padding: 5px;
      border: 1px solid #ccc;
    
      -moz-border-radius: 20px;
      -webkit-border-radius: 20px;
      border-radius: 20px;
      behavior: url(border-radius.htc);
    
    }

    
    .buscar {
      position: relative;
      padding: 5px;
    }

    .buscar input {
      width: 0;
      height: 40px;
      padding: 0 15px;
      font-size: 18px;
      color: #222;
      outline: none;
      border: 1px solid silver;
      border-radius: 30px;
      transition: all 0.6s ease;
    }

    .btns {
      width: 45px;
      height: 45px;
      line-height: 45px;
      top: 0;
      right: 0;
      position: absolute;
      background: #F9AE00;
      text-align: center;
      color: rgb(0, 0, 0);
      font-size: 18px;
      border-radius: 50%;
      cursor: pointer;
    }

    .buscar:hover input {
      width: 240px;
    }

    .buscar input:focus {
      width: 240px;
    }

  </style>
  
    
</head>



<body style="background-color:#b6b6b6">


    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1">
        {{-- Logo --}}
            <a class="navbar-brand" style="color:#ffc400" href="{{route('home')}}">
              <img src="{{asset('storage\img\logo_Bsztt.png')}}" alt="logo_bizsett" height="60px" width="60px">
            </a>
            {{-- <ul>
            <li class="nav-item">
              <a class="nav-link disabled" style="color: black" href="#"><h5 class="display-6">Bizsett </h5></a>
            </li>
            </ul> --}}
            
            {{-- Buscador --}}
            <div class="col-3 ">
              <div class="d-flex justify-content-start ">
                <div class="buscar ">
                  <input type="search" placeholder="Buscar" required>
                  <div class="btns">
                    <i class="fas fa-search icon"></i>
                  </div>
                </div>
                </div>
            </div>
            {{-- botón responsive --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          @auth
                
            
            <div class="collapse navbar-collapse flex justify-end" id="navbarSupportedContent">
              
              
              <ul class="ml-auto flex justify-end pt-1">
                {{-- Notificaciones --}}
                <li class="mx-1 my-4">
                    <a class="font-bold rounded-md" href="#">
                    <span class="position-absolute top-4 start-100 translate-middle badge rounded-pill" style="background-color: #F9AE00">
                      99+
                    </span>
                        <img src="{{asset('storage\img\bxs-bell.svg')}}" alt="bell" style="width: 22px; height: 22px; color:#f9ae00">
                    </a>
                </li>
                {{-- Foto usuario como dropdown--}}
                <li class="m-2">
                  
                  <?php $user=auth()->user(); ?>

                  <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->user()->foto_perfil == 'null')
                            <img class="rounded-circle" src="{{asset('storage\img\undraw_avatar.svg')}}" style="width: 40px; height: 40px;">
                    @else
                            <img class="rounded-circle" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user->foto_perfil}}" style="width: 40px; height: 40px;">            
                    @endif
                  </a>
                  {{-- Todo el contenido dentro del dropdown--}}
                  <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" style="left: 75%; border-radius: 15px; width: 280px; height: 400px;" >
                    <br>
                    {{-- Foto usuario --}}
                    <center>
                    @if (auth()->user()->foto_perfil == 'null')
                      <a href="{{route('foto.me', $user)}}">
                          <img class="rounded-circle" src="{{asset('storage\img\undraw_avatar.svg')}}" style="width: 60px; height: 60px; ">
                      </a>
                    @else
                      <a href="{{route('foto.me', $user)}}">
                          <img class="rounded-circle" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user->foto_perfil}}" style="width: 60px; height: 60px; ">
                      </a>
                    @endif
                    </center>
                    {{-- Name usuario --}}
                    <h5><strong>{{$user->nombre}} {{$user->apellidos}}</strong></h5>
                    
                    {{-- redirección a los datos del ususario --}}
                    <a class="dropdown-item my-4" href="{{route('perfil.datos', $user)}}">
                      <img class="position-absolute" src="{{asset('storage\img\bxs-data.svg')}}" alt="">
                      <h5>Mis datos</h5>
                    </a>
                    {{-- redirección al emprendimiento del ususario --}}
                      
                      <a class="dropdown-item my-4" href="{{route('home.perfilemp')}}">
                        <img class="position-absolute" src="{{asset('storage\img\bx-store-black.svg')}}" alt="">
                        <h5>Mi emprendimiento</h5>
                      </a>
                    
                    
                    {{-- redirección al buzón de comentarios --}}
                    <a class="dropdown-item my-4" href="{{route('buzons.create')}}">
                      <img class="position-absolute" src="{{asset('storage\img\bx-box.svg')}}" alt="">
                      <h5>Buzón de comentarios</h5>
                    </a>
                    {{-- Cerrar sesión (log out) --}}
                    <div class="dropdown-divider"></div>
                    <a class="font-bold rounded-md btn btn-outline-warning" style="" href="{{route('login.destroy')}}">Cerrar sesión</a>
                  </div>
                  
                  {{-- <p class="text-xl" style="color:rgb(255, 255, 255)"><b>
                    @if (auth()->user()->foto_perfil == 'null')
                      <a  href="{{route('perfil.me', $user)}}">
                          <img class="rounded-circle" src="{{asset('storage\img\undraw_avatar.svg')}}" style="width: 40px; height: 40px;">
                      </a>
                  @else
                      <a href="{{route('perfil.me', $user)}}">
                          <img class="rounded-circle" src="storage\fotos_perfiles\{{$user->foto_perfil}}" style="width: 40px; height: 40px;">
                      </a>
                  @endif
                  </b></p> --}}
                
                </li>
              </ul>
              

          @else
                  
                  <ul class="w-1/2 px-2 ml-auto flex justify-end pt-1">
                    {{-- Iniciar sesión (log in) --}}
                    <li class="mx-6">
                      <a class="font-semibold hover:bg-black py-2 px-3 rounded-md" style="color:#F9AE00" href="{{route('login.index')}}">Login</a>
                    </li>
                    {{-- Registrarse --}}
                    <li class="mx-6">
                      <a class="font-semibold py-2 px-3 rounded-md hover:bg-black " style="color:#F9AE00" href="{{route('register.index')}}">Registrarse</a>
                    </li>
                  </ul>
              </div>
          @endauth
          
      </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossOrigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    @yield('js')

    {{-- @include('layouts.partials.header') --}}

    @yield('content')

    @include('layouts.partials.footer')


</body>
</html>

{{-- <ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" style="color:rgb(255, 196, 0)" href=""> <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" style="color:rgb(255, 196, 0)" href="" > <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
    </a>
    <div class="dropdown-menu pull-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" style="color:rgb(255, 196, 0)" href="{{route('emprendimientos.index')}}">settings</a>
      <a class="dropdown-item" href="#">Another action</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul> --}}



