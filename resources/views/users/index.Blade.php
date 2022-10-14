@extends('layouts.plantilla')

@section('title', 'Usuarios')

@section('content')

<head>
   <link rel="stylesheet" href="{{ asset('css/Cindex.css') }}">
</head>


   <br>
   <a href="{{route('users.create')}}">Crear Usuario</a>
   <br>
    <br>

<div class="container-fluid">
   <div id="divs">

      <table class="table table-hover text-light"  id="idusers"  style="background-color:rgba(102, 102, 102, 0.637)">
            
         <thead class="">
               <th>Id</th>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Telefono</th>
               <th>Tipo de documento</th>
               <th>Número de documento</th>
               <th>Dirección</th>
               <th>Ciudad</th>
               <th>Género</th>
               <th>Tipo persona</th>
               <th>Correo</th>
               <th>Contraseña</th>
         </thead>

         <tbody>
            @foreach ($users as $user)
            <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->nombre}}</td>
               <td>{{$user->apellidos}}</td>
               <td>{{$user->telefono}}</td>
               <td>{{$user->tipodocumento->nombre}}</td>
               <td>{{$user->numero_documento}}</td>
               <td>{{$user->direccion}}</td>
               <td>{{$user->ciudad_id}}</td>
               <td>{{$user->genero->nombre_genero}}</td>
               <td>{{$user->tipopersona->nombre}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->password}}</td>   

               <td>
                  <form action="{{route('users.destroy', $user)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
                  
                  </form>
               
                  <center>
                  <a href="{{route('users.edit', $user)}}" >Editar</a>
                  </center>
               </td>

            </tr>

            @endforeach
         </tbody>
         
               
         

      </table>
   </div>
</div>


@endsection