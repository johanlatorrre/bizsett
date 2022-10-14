<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publicacione;
use Illuminate\Http\Request;

class PublicacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones=Publicacione::included()
        ->filter()
        ->sort()
        ->get();
        return $publicaciones;   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Publicacione=Publicacione::create($request->all());
        return $Publicacione; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicacione  $publicacione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacione = Publicacione::included()->findOrFail($id);
        return $publicacione;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicacione  $publicacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacione $publicacione)
    {
        $publicacione-> update ($request-> all());
        return $publicacione;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicacione  $publicacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacione $publicacione)
    {
        $publicacione-> delete ();
        return $publicacione;
    }
}
