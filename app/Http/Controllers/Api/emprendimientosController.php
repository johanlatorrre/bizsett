<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emprendimientos;
use Illuminate\Http\Request;

class emprendimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzones= Emprendimientos::all();
        return $buzones;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $Emprendimientos=Emprendimientos::create($request->all());
    return $Emprendimientos; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprendimientos  $emprendimientos
     * @return \Illuminate\Http\Response
     */
    public function show(Emprendimientos $emprendimientos)
    {
        return $emprendimientos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emprendimientos  $emprendimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprendimientos $emprendimientos)
    {
        $emprendimientos-> update ($request-> all());
        return $emprendimientos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emprendimientos  $emprendimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprendimientos $emprendimiento)
    {
        $emprendimiento-> delete ();
        return $emprendimiento;
    }
}
