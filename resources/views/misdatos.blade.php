@extends('layouts.plantilla')

@section('title', 'Mis datos')

@section('content')
<head>

     <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }

        .contenedor{
        align-items: center;
        display: flex;

        flex-direction: column;

        
        justify-content: center;
        align-items:center 
        } 
    </style>
     
</head>

<body>

    <div class="contenedor">

        <div class="d-flex justify-content-evenly">
    
            @if (auth()->user()->foto_perfil == 'null')
                <a href="{{route('foto.me', $user)}}">
                    <img class="rounded-circle" src="{{asset('storage\img\undraw_avatar.svg')}}" style="width: 90px; height: 90px;">
                </a>
            @else
                <a href="{{route('foto.me', $user)}}">
                    <img class="rounded-circle" src="{{ 'http://localhost/bizsett/public/storage/fotos_perfiles/' . $user->foto_perfil}}" style="width: 90px; height: 90px;">
                </a>
            @endif

            <a href="">
                <img src="{{asset('storage\img\bx-edit.svg')}}" alt="edit">
            </a>
        </div>

        <table class="default">

            <tr>
            <th>nombre <hr></th> 
            <th>{{$user->nombre}}<hr></th>
            </tr>
        
                            
            </tr>
            <th>apellidos <hr></th>
            <th>{{$user->apellidos}}<hr></th>
            <tr>
                                    
            <th>correo <hr></th>
            <th>{{$user->email}}<hr></th>
            </tr>

            <tr>
            <th>fecha de nacimiento<hr></th>
            <th>00/01/0002 <hr></th>
            </tr>

            <tr>
            <th>Número telefónico<hr></th>
            <th>{{$user->telefono}}<hr></th>
            </tr>
                                
            <tr>
            <th>género<hr></th>
            <th>{{$user->genero->nombre_genero}}<hr></th>
            </tr>

            <tr>
            <th>Tipo de documento<hr></th>
            <th>{{$user->tipodocumento->nombre}}<hr></th>
            </tr>

            <tr>
            <th>Número de identificación<hr></th>
            <th>{{$user->numero_documento}}    <hr></th>
            </tr>

        </table>
    </div>
</body> 
@endsection
