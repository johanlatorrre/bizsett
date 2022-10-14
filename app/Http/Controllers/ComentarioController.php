<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;
use App\Models\Comentario;

use App\Models\Publicacione;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(StoreComentario $request, $publicacione){

        $comentario = new Comentario();

        $comentario->comentario = $request->comentario;
        $comentario->publicacion_id = $publicacione;
        $comentario->user_id = auth()->user()->id;

        $comentario->save();

        return redirect()->route('notificaciones', compact('publicacione'));
        //return redirect()->route('home');
        
    }

    public function destroy(Comentario $comentario){
        
        $comentario->delete();
        
        return redirect()->route('home');
    }
}
