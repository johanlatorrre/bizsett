<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buzon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzones=Buzon::included()
        ->filter()
        ->sort()
        ->get();
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
        
    $Buzon=Buzon::create($request->all());
    return $Buzon; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buzon = Buzon::included()->findOrFail($id);
       return $buzon;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buzon $buzon)
    {
        $buzon-> update ($request-> all());
        return $buzon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buzon $buzone)
    {
        $buzone-> delete ();
        return $buzone;
    }
}
