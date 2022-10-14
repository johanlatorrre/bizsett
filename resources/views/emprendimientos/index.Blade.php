@extends('layouts.plantilla')

@section('title', 'Emprendimientos')

@section('content')


   <br>
   <a href="{{route('emprendimientos.create')}}">Crear emprendimiento</a>
   <br>
    <br>

<div class="container-fluid" >

   <table id="idemprendimientos" class="table table-hover text-light" style="background-color:rgba(102, 102, 102, 0.637)">

     <thead>
      
         <th>Id</th>
         <th>Nombre</th>
         <th>Descripción</th>
         <th>Clasificación</th>
         <th>usuario</th>

      </thead>

      <tbody>
         @foreach ($emprendimientos as $emprendimiento)
            <tr>
               <td>{{$emprendimiento->id}}</td>
               <td>{{$emprendimiento->nombre_emprendimiento}}</td>
               <td>{{$emprendimiento->descripcion}}</td>
               <td>{{$emprendimiento->clasificacion}}</td>
               <td>{{$emprendimiento->user_id}}</td>

               <td>
                  <form action="{{route('emprendimientos.destroy', $emprendimiento)}}" method="post">
                     @csrf
                     @method('delete')
                        <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
                  </form>
                  
                  <form action="{{route('emprendimientos.edit', $emprendimiento)}}">
                     <button type="submit" class="btn btn-link" style="color: #F9AE00">Editar</button>
                  </form>
               </td>
            </tr>
         @endforeach
      </tbody>
    
   </table>
      
</div>

@endsection