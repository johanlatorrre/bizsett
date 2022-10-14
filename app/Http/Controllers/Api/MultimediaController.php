<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mul;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multimedia=Multimedia::included()
        ->filter()
        ->sort()
        ->get();
    return $multimedia;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Multimedia=Multimedia::create($request->all());
    return $Multimedia; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multimedia = Multimedia::included()->findOrFail($id);
        return $multimedia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimedia $multimedia)
    {
        $multimedia-> update ($request-> all());
        return $multimedia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multimedia $multimedia)
    {
        $multimedia-> delete ();
        return $multimedia;
    }
}
