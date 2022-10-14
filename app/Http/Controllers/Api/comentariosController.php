<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class comentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentario=Comentario::included()
        ->filter()
        ->sort()
        ->get();
    return $comentario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $Comentarios=Comentarios::create($request->all());
    return $Comentarios; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::included()->findOrFail($id);
        return $comentario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        $comentarios-> update ($request-> all());
        return $comentarios;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        $comentarios-> delete ();
        return $comentarios;
    }
}
