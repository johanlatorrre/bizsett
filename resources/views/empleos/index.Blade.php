@extends('layouts.plantilla')

@section('title', 'Solicitudes de empleo')

@section('content')

   <br>
   <a href="{{route('empleos.create')}}">Solicitar puesto de trabajo</a>
   <br>
   <br>

<div class="container-fluid" >

     
   <table id="idbuzons" class="table table-hover text-light" style="background-color:rgba(102, 102, 102, 0.637)">
      
     <thead>
      
         <th>Id</th>
         <th>Archivo</th>
         <th>Mensaje</th>
         <th>Emprendimiento</th>
         <th>Usuario</th>

      </thead>

      <tbody>
         @foreach ($empleos as $empleo)
        <tr>
         <td>{{$empleo->id}}</td>
         <td>{{$empleo->evidencia}}</td>
         <td>{{$empleo->mensaje_trabajo}}</td>
         <td>{{$empleo->emprendimiento_id}}</td>
         <td>{{$empleo->user_id}}</td>

         <td>
            
            <form action="{{route('empleos.destroy', $empleo)}}" method="post">
               @csrf
               @method('delete')
                  
                  <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
                  
            </form>
            
            <form action="{{route('empleos.edit', $empleo)}}">
               
                  <button type="submit" class="btn btn-link" style="color: #F9AE00">Editar</button>
                  
            </form>

         </td>

         </tr>

        @endforeach
        
      </tbody>

   </table>
      
</div>

@endsection