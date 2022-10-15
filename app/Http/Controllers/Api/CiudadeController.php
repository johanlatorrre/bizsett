<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciudade;
use Illuminate\Http\Request;

class CiudadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudade=Ciudade::included()
        ->filter()
        ->sort()
        ->get();
    return $ciudade;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Ciudade=Ciudade::create($request->all());
    return $Ciudade; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudade  $ciudade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudade = Ciudade::included()->findOrFail($id);
        return $ciudade;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciudade  $ciudade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudade $ciudade)
    {
        $ciudade-> update ($request-> all());
        return $ciudade;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudade  $ciudade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudade $ciudade)
    {
        $ciudade-> delete ();
        return $ciudade;
    }
}
