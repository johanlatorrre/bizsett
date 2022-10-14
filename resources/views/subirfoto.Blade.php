@extends('layouts.plantilla')

@section('title' , 'Foto de perfil')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <center>
    <h1 class="text-3xl text-center font-bold">Foto de perfil</h1>

    <br>

    <form action="{{route('subir.foto', $user)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')

        
            <input type="file" class="" name="foto_perfil" value="{{old('foto_perfil')}}">
      

        <br>



        <br>
        <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Subir</button>
        <br>
        <br>
        <a style="color:black" href="{{route('home')}}"><b>cancelar</b></a>
    </form>
    </center>
</div>

@endsection