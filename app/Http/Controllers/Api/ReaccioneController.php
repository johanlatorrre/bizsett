<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reaccione;
use Illuminate\Http\Request;

class ReaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reaccione=Reaccione::included()
        ->filter()
        ->sort()
        ->get();
    return $reaccione;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reaccione=Reaccione::create($request->all());
        return $reaccione; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reaccione  $reaccione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reaccione = Reaccione::included()->findOrFail($id);
        return $reaccione;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reaccione  $reaccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaccione $reaccione)
    {
        $reaccione-> update ($request-> all());
        return $reaccione;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reaccione  $reaccione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaccione $reaccione)
    {
        $reaccione-> delete ();
        return $reaccione;
    }
}
