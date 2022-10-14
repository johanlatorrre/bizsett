@extends('layouts.plantilla')

@section('title' , $emprendimiento->nombre_emprendimiento)

@section('content')

<div class="container-fluid">
  <div class="row">
        <div class="col-5">
          <div class="row" >
            <div class="col-4">
              @foreach ($users as $user)
                @if ($emprendimiento->user_id==$user->id)
                {{-- Foto del usuario --}}
                  @if ($user->foto_perfil == 'null')
                    <a href="{{route('foto.me', $user)}}">
                      <div class=""><img class="" style="width: 180px; height: 180px;" src="{{asset('storage\img\undraw_avatar.svg')}}" alt="user" ></div>
                    </a>
                  @else
                    <a href="{{route('foto.me', $user)}}">
                      <div class=""><img class="" style="width: 180px; height: 180px;" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user->foto_perfil}}" alt="user" ></div>
                    </a>
                  @endif
                @endif
              @endforeach
            </div>

            <div class="col-5">
              {{-- Nombre del emprendimiento --}}
              <h1>{{$emprendimiento->nombre_emprendimiento}}</p>
            </div>
           
            
          </div>
          <div class="row text-center m-t-20">
            <div class="col-lg-4 col-md-4 m-t-20">
              {{-- Contador de publicaciones --}}
              <?php 
                $public=0;
                foreach($publicaciones as $publicacione){
                    if($publicacione->emprendimiento_id == $emprendimiento->id){
                        $public=$public+1;
                    }
                }
                $public;
            ?>
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

          <article class="text-center">

              {{-- Descripción del emprendimiento --}}
          <p>{{$emprendimiento->descripcion}}</p> 

          </article>

          <table class="" style="background-color: rgb(156, 153, 158)">
              <thead>
                  <tr>
                      <th>Buscan empleo</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($empleos as $empleo)
                      @if ($empleo->emprendimiento_id == $emprendimiento->id)
                      <tr>
                          <td>usuario</td>
                      </tr>
                      @endif
                  @endforeach
              </tbody>
          </table>
        </div>


        <div class="col-5">
          {{-- Publicaicones --}}
          @foreach ($publicaciones as $publicacione)
            @if ($publicacione->emprendimiento_id == $emprendimiento->id)
            

              <div class="row">
                
          
                <div class="card mb-4" style="border-radius: 15px; background-color:#f1f1f1 ;">
          
                  <div class="card-head ">
                      @foreach ($emprendimientos as $emprendimiento)
                        @if ($emprendimiento->id == $publicacione->emprendimiento_id)
                          <br>
                          <div class="row">
                            <div class="col-1 p-0">
                                    {{-- Foto usuario publicación --}}
                              @foreach ($users as $user)
                                @if ($emprendimiento->user_id==$user->id)
                                  @if ($user->foto_perfil == 'null')
                                      <a href="{{route('perfilemp.user', $emprendimiento)}}">
                                          <img class="rounded-circle mx-3" src="{{asset('storage\img\undraw_avatar.svg')}}" style="width: 50px; height: 50px;">
                                      </a>
                                  @else
                                      <a href="{{route('perfilemp.user', $emprendimiento)}}">
                                          <img class="rounded-circle mx-3" src="storage\fotos_perfiles\{{$user->foto_perfil}}" style="width: 50px; height: 50px;">
                                      </a>
                                  @endif
                                @endif
                              @endforeach
                            </div>
                            <div class="col-8 mx-3">
                                  {{-- Nombre emprendimiento de la publicación --}}
                              <h5 class="card-title"><strong><a href="{{route('perfilemp.user', $emprendimiento)}}">{{$emprendimiento->nombre_emprendimiento}}</a></strong></h5>
                                  {{-- fecha y hora de la publicación --}}
                              <p class="card-text"><small class="text-muted">{{$publicacione->created_at}}</small></p>
                            
                            </div>
                            @auth
                              @if (auth()->user()->id==$emprendimiento->user_id)
                                <div class="col-2 d-flex justify-content-end">
                                      {{-- Opciones de la publicación --}}
                                  <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="storage\img\bx-dots-vertical-rounded.svg" alt="dots-vertical">
                                  </a>
          
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      {{-- Eliminar publicación --}}
                                      @foreach ($multimedias as $multimedia)
                                        @if ($publicacione->id == $multimedia->publicacion_id)
                                          <form action="{{route('publicaciones.destroy', $publicacione)}}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-link dropdown-item" style="color:#ffc400">Eliminar</button>
                                      {{-- Editar publicación --}}
                                          </form>
                                    
                                          <a class="dropdown-item" href="{{route('publicaciones.edit', $publicacione)}}">Editar</a>
                                    
                                          <div class="dropdown-divider"></div>
                                      {{-- Cancelar opciones de la publicación --}}
                                          <a class="dropdown-item" href="">Cancelar</a>
                                        @endif
                                      @endforeach
                                    
                                  </div>
                              
                                </div>
                              @endif
                            @endauth
                          </div>
                        @endif
                      @endforeach
                      {{-- Descripción  --}}
                      <p class="card-text">{{$publicacione->descripcion}}</p>
          
                    </div>
          
                    <hr>
                    <br>
                    <center>
                      {{-- IMAGEN --}}
                    @foreach ($multimedias as $multimedia)
                      @if ($publicacione->id == $multimedia->publicacion_id)
                        <img src="storage\multimedia_folder\{{($multimedia->url_contenido)}}" style="width:40rem; border-radius: 15px" class="card-img-top" alt="{{$multimedia->url_contenido}}">
                      @endif
                    @endforeach
          
                  </center>
                  <br>
                  <hr>
                  
                  <div class="card-body">
                      <div class="row">
                        <div class="col-3">
          
                        @auth
                          
                          {{-- Si el usuario logueado ha reaccionado a la publicación o no --}}
                          <?php 
                          $reac='no';
                          for ($i=0; $i < 1;) { 
                            foreach ($reacciones as $reaccione){
                              if (auth()->user()->id == $reaccione->user_id){
                                if ($reaccione->publicacion_id == $publicacione->id){
                                        $reac='si';
                                  }else{
                                      $i++;
                                  }
                              }
                            }$i=1;
                          }
                          
                          ?>
                          {{-- Elimina la reacción --}}
                          @if ($reac == 'si')
                            <form action="{{route('reacciones.destroy', $reaccione)}}" method="POST">
                              @csrf
                              @method('delete')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 174, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>  
                                </button>
                            </form>
                          @else
                            {{-- Crea la reacción --}}
                            <form action="{{route('reacciones.store', $publicacione)}}" method="POST">
                              @csrf
                              <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                              </button>
                            </form>
                          @endif
                            
          
                            {{-- Si no está logueado --}}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                        @endauth
                            {{-- Contador de reacciones --}}
                            <?php 
                                $cont=0;
                                foreach($reacciones as $reaccione){
                                    if($reaccione->publicacion_id == $publicacione->id){
                                        $cont=$cont+1;
                                    }
                                }
                                $cont;
                            ?>
                            {{-- Número de reacciones --}}
                            <h5>{{$cont}} reacciones</h5>
          
                            {{-- Contador de comentarios --}}
                            <?php 
                                $coment=0;
                                foreach($comentarios as $comentario){
                                    if($comentario->publicacion_id == $publicacione->id){
                                        $coment=$coment+1;
                                    }
                                }
                                $coment;
                            ?>
                            
                        </div>
                        {{-- ver los comentarios (Acordion) --}}
                        <div class="col-7 d-flex justify-content-center">
                          
                          <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #f9ae00">
                            Ver comentarios ( {{$coment}} )
                          </a>
                        
                        </div>
                        {{-- Compartir --}}
                        <div class="col-2">
                            <img src="storage\img\bxs-share-alt.svg" alt="">
                        </div>
                      </div>
                      <hr>
                      <br>
                      {{-- Comentar --}}
                      @auth
                          
                      <form action="{{route('comentarios.store', $publicacione)}}" method="POST">
                        @csrf
                        <input name="comentario" class="round w-full placeholder-gray-500" placeholder="Deja un comentario..." style="width:85%; background-color:rgb(212, 212, 212)" type="text">
          
                        <button class="btn" style="background-color: #ffae00;  border-radius: 15px; width:50px" type="submit">
                          <img style="width:50px;" src="storage\img\bx-send.svg" alt="send">
                        </button>
                      </form>
                      <hr>
                      
                      @endauth
                      {{-- Comentarios --}}
                      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div class="row">
                            @foreach ($comentarios as $comentario)
                              @foreach ($users as $user)
                                @if ($comentario->user_id == $user->id)
                                  @if ($comentario->publicacion_id == $publicacione->id)
                                    <div class="col-8">
                                            <strong>{{$user->nombre}}.</strong>
                                            <p class="h6">{{$comentario->comentario}}</p>
                                      <hr>
                                    </div>
                                      @auth
                                          {{-- Si el usuario logueado es el que hizo el comentario --}}
                                        @if (auth()->user()->id==$comentario->user_id)
                                          <div class="col-2 d-flex justify-content-end">
                                            {{-- Opciones del comentario --}}
                                            <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <img src="storage\img\bx-dots-vertical-rounded.svg" alt="dots-vertical">
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                              {{-- Eliminar comentario --}}
                                              <form action="{{route('comentarios.destroy', $comentario)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link dropdown-item" style="color:rgb(255, 196, 0)">Eliminar</button>
                                              </form>
                                              {{-- Editar comentario --}}
                                              <a class="dropdown-item" href="">Editar</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="">Cancelar</a>
                                            </div>
                                          </div>
                                      
                                        @endif
                                      @endauth
                                  @endif      
                                @endif
                              @endforeach
                            @endforeach
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
          
              </div>
                
            @endif
        @endforeach
        </div>
        </div>
  </div>
</div>



@endsection