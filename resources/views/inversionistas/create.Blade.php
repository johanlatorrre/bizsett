@extends('layouts.plantilla')

@section('title', 'Inversiones')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
    rounded-lg shadow-lg">

    @if (auth()->user()->tipopersona_id == '2')
        <h1 class="text-3xl text-center font-bold">Enviar Propuesta</h1>
    @else
        <h1 class="text-3xl text-center font-bold">Enviar Propuesta a {{$emprendimiento->nombre_emprendimiento}}</h1>
    @endif
    
    <br>
    
    <form action="{{route('inversionistas.store', $emprendimiento)}}" method="POST">
        @csrf
        <center>
            <label for="">
                <textarea name="propuesta" class="form-control" placeholder="Propuesta de inversión" id="floatingTextarea">{{old('propuesta')}}</textarea>
            </label>
            
        
            @error('propuesta')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        
            <br>
            

            @if (auth()->user()->tipopersona_id == '2')
            <br>
                    <label class="mx-4">
                        <strong>Usuario:</strong> 
                        <br>
                        <select name="user_id" id="iduser" class="form-select" aria-label="Default select example">
                            
                            @foreach ($users as $user)
                                
                                <option value="{{$user->id}}">{{$user->nombre}}</option>
                            @endforeach
                            
                        </select>
                    </label>
                    <label class="mx-4">
                        <strong>Emprendimiento:</strong> 
                        <br>
                        <select name="emprendimiento_id" id="idemprendimiento" class="form-select" aria-label="Default select example">
                            
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
                <a style="color:black" href="{{route('inversionistas.index')}}"><b>cancelar</b></a>
            
            @else

                <br>
                <button class="btn" style="background-color: rgb(255, 174, 0) " type="submit">Enviar</button>
                <br>
                <br>
                <a style="color:black" href="{{route('home')}}"><b>cancelar</b></a>
            @endif
        </center>
    </form>
</div>

@endsection
