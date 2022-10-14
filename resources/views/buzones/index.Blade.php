@extends('layouts.plantilla')

@section('title', 'Buzon')

@section('content')



   <br>
   <a href="{{route('buzons.create')}}">Enviar una queja o reclamo</a>
   <br>
   <br>

<div class="container-fluid" >

     
   <table id="idbuzons" class="table table-hover text-light" style="background-color:rgba(102, 102, 102, 0.637)">

      <thead>
      
         <th>Id</th>
         <th>Mensaje</th>
         <th>Usuario</th>

      </thead>

      <tbody>
         @foreach ($buzons as $buzon)
         <tr>
            <td>{{$buzon->id}}</td>
            <td>{{$buzon->mensaje}}</td>
            <td>{{$buzon->user_id}}</td>

            <td>
               
               <form action="{{route('buzons.destroy', $buzon)}}" method="post">
                  @csrf
                  @method('delete')
                     
                     <button type="submit" class="btn btn-link" style="color: #F9AE00">Eliminar</button>
                     
               </form>
               
               <form action="{{route('buzons.edit', $buzon)}}">
                  
                     <button type="submit" class="btn btn-link" style="color: #F9AE00">Editar</button>
                  
               </form>

            </td>

         </tr>

        @endforeach
      </tbody>

   </table>
      
</div>

@endsection