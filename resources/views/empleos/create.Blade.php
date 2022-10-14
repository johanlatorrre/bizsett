@extends('layouts.plantilla')

@section('title', 'Solicitud de empleo')

@section('content')

 
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">

    <h1 class="text-3xl text-center font-bold">Solicitar puesto de trabajo</h1>

    <center>

    <form action="{{route('empleos.store')}}" method="POST">

        @csrf

        <label >
            Asunto:
            <br>
            <input type="textarea" class="form-control" name="mensaje_trabajo" value="{{old('mensaje_trabajo')}}">
        </label>
        <br>
        

        @error('mensaje_trabajo')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <label >
            Archivo:
            <br>
            <input type="textarea" class="form-control" name="evidencia" value="{{old('evidencia')}}">
        </label>
        <br>

        @error('evidencia')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
    

        @if (auth()->user()->tipopersona_id == '2')
            <label >

                <select name="user_id" id="iduser" class="form-select" aria-label="Default select example">
                    <option selected>Usuario</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->nombre}}</option>
                    @endforeach
                    
                </select>
            </label>

            <label >
                <br>

                <select name="emprendimiento_id" id="idemprendimiento" class="form-select" aria-label="Default select example">
                    <option selected>Emprendimiento</option>
                    @foreach ($emprendimientos as $emprendimiento)
                        <option value="{{$emprendimiento->id}}">{{$emprendimiento->nombre_emprendimiento}}</option>
                    @endforeach
                    
                </select>
            </label>

            <br>
            <br>

            <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Enviar</button>
            
            <br>
            <br>
            <a style="color:black" href="{{route('empleos.index')}}"><b>cancelar</b></a>

        @else
            <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Enviar</button>
            <br>
            <br>
            <a style="color:black" href="{{route('home')}}"><b>cancelar</b></a>
        @endif
    </form>
    
    </center>

</div>


@endsection
