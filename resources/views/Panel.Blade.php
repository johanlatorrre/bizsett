@extends('layouts.plantilla')

@section('title', 'Panel de control')

@section('content')


<div class="row">
    <div class="col-md-3 text-center" style="background-color:rgba(80, 80, 80, 0.603); height: 500px">
        <div class=" p-2">
            <center>
            <img class="rounded-circle" src="storage\img\undraw_avatar.svg" style="width: 90px; height: 90px; border: 2px solid rgba(182, 176, 176, 0.479)"> 
            </center>
            

        </div>
            <hr>
    
            <div class=" py-1">
                <a style="color: black" href="{{route('users.index')}}"><h5 >Usuarios</h5></a>
            </div>
    
            <hr>
    
            <div class=" py-1">
                <a style="color: black" href="{{route('emprendimientos.index')}}"><h5 >Emprendimientos</h5></a>
            </div>
    
            <hr>
    
            <div class=" py-1">
                <a style="color: black" href="{{route('buzons.index')}}"><h5 >Buzón de comentarios</h5></a>
            </div>
    
            <hr>
    
            <div class=" py-1">
                <a style="color: black" href="{{route('publicaciones.index')}}"><h5 >Publicaciones</h5></a>
            </div>
    </div>


    <div class="col-8">
        <img src="storage\img\undraw_dashboard_re_3b76.svg" alt="">
    </div>
    
</div>
@endsection