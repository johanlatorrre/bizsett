<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inversionista;
use Illuminate\Http\Request;

class InversionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inversionista=Inversionista::included()
        ->filter()
        ->sort()
        ->get();
    return $inversionista;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inversionista=Inversionista::create($request->all());
        return $inversionista; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $inversionista = Inversionista::included()->findOrFail($id);
    return $inversionista;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inversionista $inversionista)
    {
        $inversionista-> update ($request-> all());
        return $inversionista;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inversionista $inversionista)
    {
        $inversionista-> delete ();
        return $inversionista;
    }
}
