<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notificacione;
use Illuminate\Http\Request;

class NotificacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacione=Notificacione::included()
        ->filter()
        ->sort()
        ->get();
    return $notificacione;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $Noticacione=Notificacione::create($request->all());
    return $Noticacione; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notificacione  $notificacione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificacione = Notificacione::included()->findOrFail($id);
        return $notificacione;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notificacione  $notificacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notificacione $notificacione)
    {
        $notificacione-> update ($request-> all());
        return $notificacione;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notificacione  $notificacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notificacione $notificacione)
    {
        $notificacione-> delete ();
        return $notificacione;
    }
}
