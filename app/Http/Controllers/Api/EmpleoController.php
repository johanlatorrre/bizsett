<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleo;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleo=Empleo::included()
        ->filter()
        ->sort()
        ->get();
    return $empleo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleo=Empleo::create($request->all());
        return $empleo; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleo = Empleo::included()->findOrFail($id);
        return $empleo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleo $empleo)
    {
        $empleo-> update ($request-> all());
        return $empleo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleo $empleo)
    {
        $empleo-> delete ();
        return $empleo;
    }
}
