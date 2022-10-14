@extends('layouts.plantilla')

@section('title', 'Inversiones')

@section('content')

<body>

   <br>
   <a href="{{route('inversionistas.create')}}">¡Invertir!</a>
   <br>
   <br>

   <div class="container-fluid" >

   <table id="idinversionistas" class="table table-hover text-light" style="background-color:rgba(102, 102, 102, 0.637)">

      <thead>

         <th>Id</th>
         <th>Propuesta</th>
         <th>Emprendimiento</th>
         <th>Usuario</th>

      </thead>

      <tbody>
         @foreach ($inversionistas as $inversionista)
        <tr>
         <td>{{$inversionista->id}}</td>
         <td>{{$inversionista->propuesta}}</td>
         <td>{{$inversionista->emprendimiento_id}}</td>
         <td>{{$inversionista->user_id}}</td>

         <td>
            
            <form action="{{route('inversionistas.destroy', $inversionista)}}" method="post">
               @csrf
               @method('delete')
                  
                  <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
                  
               
            </form>
            
            <form action="{{route('inversionistas.edit', $inversionista)}}">
               
               <button type="submit" class="btn btn-link" style="color: #F9AE00">Editar</button>
               
            </form>

         </td>

         </tr>

         @endforeach
      </tbody>
    
   </table>
      
</div>

@endsection