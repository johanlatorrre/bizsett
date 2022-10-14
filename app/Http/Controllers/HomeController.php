<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Empleo;
use App\Models\Emprendimiento;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use App\Models\Publicacione;
use App\Models\Reaccione;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke(){

        $publicaciones =Publicacione::orderBy('id', 'desc')->paginate();
        $multimedias =Multimedia::all();
        $emprendimientos =Emprendimiento::all();
        $comentarios =Comentario::all();
        $reacciones =Reaccione::all();
        $users =User::all();

        $reac = 'no';

        return view('home', compact('publicaciones','multimedias', 'emprendimientos', 'users', 'comentarios', 'reacciones', 'reac'));
    }

    
    public function index(){

        return view('Panel');
    }

  


    public function principal(){

        $publicaciones =Publicacione::all();
        $multimedias =Multimedia::all();

        return view('principal', compact('publicaciones', 'multimedias'));
    }



    public function prueba(){

        return view('prueba');
    }
}
