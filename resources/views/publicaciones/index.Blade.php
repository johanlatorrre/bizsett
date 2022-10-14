@extends('layouts.plantilla')

@section('title', 'Publicaciones')

@section('content')

   <br>
   <a href="{{route('publicaciones.create')}}">Crear una publicación</a>
   <br>
   <br>

<div class="container-fluid" >

   <div id="divs">

   <table id="idpublicaciones" class="table table-hover text-light" style="background-color:rgba(102, 102, 102, 0.637)">

     <thead>
      
         <th>Id</th>
         <th>Descripción</th>
         <th>Emprendimiento</th>
         <th>Contenido</th>

      </thead>

      <tbody>
         @foreach ($publicaciones as $publicacione)
         <tr>
         <td>{{$publicacione->id}}</td>
         <td>{{$publicacione->descripcion}}</td>
         <td>{{$publicacione->emprendimiento_id}}</td>

         <td>
            @foreach ($multimedias as $multimedia)

            @if ($multimedia->id==$publicacione->id)
            <img src="{{asset($multimedia->url_contenido)}}" class="img-fluid" width="120px" alt="{{$multimedia->url_contenido}}">
            @endif

            @endforeach

         </td>
         <td>
            
            <form action="{{route('publicaciones.destroy', $publicacione )}}" method="post">
               @csrf
               @method('delete')
                  
                  <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
               
            </form>
            
            <form action="{{route('publicaciones.edit', $publicacione )}}">
               
                  <button type="submit" class="btn btn-link" style="color: #F9AE00">Editar</button>
                  
            </form>


         </td>

         </tr>

            @endforeach
         </tbody>
    
      </table>
   </div>
</div>


@endsection