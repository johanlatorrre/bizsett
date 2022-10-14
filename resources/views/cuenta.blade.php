@extends('layouts.plantilla')

@section('title' , "$emprendimiento->nombre_emprendimiento")

@section('content')

<head>
  <link rel="stylesheet" href="{{ asset('css/perfilcuenta.css') }}">
</head>

{{-- Botones para invertir y solicitar empleo --}}

<body>
  @auth
    <ul>
        <a href="{{ route('inversionistas.crear', $emprendimiento) }}" class="btn btn-warning btn-sm btn-md btn-rounded" >invertir</a> 
        <a href="" class="btn btn-warning btn-sm btn-md btn-rounded">Postularme</a>
    </ul>
  @endauth

  <div class="container-fluid">

    <center>
    <div class="perfil">
      <div class="col-md-10">
          <!-- Column -->
        
        @foreach ($users as $user)
          @if ($emprendimiento->user_id==$user->id)
            @if ($user->foto_perfil == 'null')
            {{-- Foto usuario --}}
            <div class=""><img class="" style="width: 200px; height: 200px;" src="{{asset('storage\img\undraw_avatar.svg')}}" alt="user" ></div>
            @else
            <div class=""><img class="" style="width: 200px; height: 200px;" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user->foto_perfil}}" alt="user" ></div>
            @endif
          @endif
        @endforeach
          <div>
            {{-- Nombre del emprendimiento --}}
          <p class="h1 font-bold">{{$emprendimiento->nombre_emprendimiento}}</p>
          </div>
            {{-- Descripción del emprendimiento --}}
          <p>{{$emprendimiento->descripcion}}</p> 
            {{-- Botón de seguir --}}
            <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">
              Seguir
            </a>
              <div class="row text-center m-t-20">
                  <div class="col-lg-4 col-md-4 m-t-20">
                    {{-- Contador de publicaciones, del emprendimiento --}}
                    <?php 
                      $public=0;
                      foreach($publicaciones as $publicacione){
                          if($publicacione->emprendimiento_id == $emprendimiento->id){
                              $public=$public+1;
                          }
                      }
                      $public;
                    ?>
                  {{-- Número de publicaciones, de seguidores y seguidos --}}
                    <p class="h3 m-b-0 font-light font-bold">{{$public}}</p>
                    <p class="h3 m-b-0 font-light ">Publicados</p>
                  </div>
                  <div class="col-lg-4 col-md-4 m-t-20">
                    <p class="h3 m-b-0 font-light font-bold">434K</p>
                    <p class="h3 m-b-0 font-light ">Seguidores</p>
                  </div>
                  <div class="col-lg-4 col-md-4 m-t-20">
                    <p class="h3 m-b-0 font-light font-bold">5454</p>
                    <p class="h3 m-b-0 font-light ">Seguidos</p>
                  </div>
              </div>
        </div>
      </div>

      <br>
    
{{-- Publicaciones del emprendimiento --}}

    <div class="row">

      @foreach ($publicaciones as $publicacione)
        @if ($publicacione->emprendimiento_id == $emprendimiento->id)
          
            {{-- Cada publicación --}}
          <div class="card col-3 m-5 ">
            
              <div class="row my-2">
                <div class="col-1 p-0">
                    
                </div>
                <div class="col-9 ">
                      {{-- Nombre emprendimiento de la publicación --}}
                  <h5 class="card-title"><strong><a href="{{route('perfilemp.user', $emprendimiento)}}">{{$emprendimiento->nombre_emprendimiento}}</a></strong></h5>
                      {{-- fecha y hora de la publicación --}}
                  <p class="card-text"><small class="text-muted">{{$publicacione->created_at}}</small></p>
                
                </div>
                  @auth
                  
                  @if (auth()->user()->id==$emprendimiento->user_id)
                  
                    <div class="col-2 d-flex justify-content-end">
                          {{-- Opciones de la publicación --}}
                      <a class=""  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('storage\img\bx-dots-vertical-rounded.svg')}}" alt="dots-vertical">
                      </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          {{-- Eliminar publicación --}}
                          @foreach ($multimedias as $multimedia)
                          @if ($publicacione->id == $multimedia->id)
                        <form action="{{route('publicaciones.destroy', $publicacione, $multimedia)}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-link dropdown-item" style="color:#ffc400">Eliminar</button>
                          {{-- Editar publicación --}}
                        </form>
                        
                          <a class="dropdown-item" href="{{route('publicaciones.edit', $publicacione, $multimedia)}}">Editar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Cancelar</a>
                          @endif
                        @endforeach
                        
                      </div>
                  
                    </div>
                  @endif
                    
                @endauth  
              </div>
              
              {{-- Imagen --}}
            
              <div class="img border border-gray-400 shadow-lg" style="background-color:rgb(209, 209, 209)">
                @foreach ($multimedias as $multimedia)
                  @if ($publicacione->id == $multimedia->id)
                    <img style="height:12rem" src="{{ 'http://localhost/bizsett/public/storage/multimedia_folder/' . $multimedia->url_contenido}}" class="img-fluid" alt="{{$multimedia->url_contenido}}">
                  @endif
                @endforeach
              </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</body>
@endsection


