<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Models\Empleo;
use App\Http\Requests\StoreEmpleo;
use App\Models\User;

class EmpleoController extends Controller
{

    public function index(){

        $empleos =Empleo::all();

    return view('empleos.index', compact('empleos'));
    }

    


    public function create(){

        $emprendimientos =Emprendimiento::all();
        $users =User::all();

        return view('empleos.create', compact('emprendimientos', 'users'));
    }




    public function store(StoreEmpleo $request){

        if (auth()->user()->tipopersona_id == '2'){
            $empleo = Empleo::create($request->all());

            return redirect()->route('empleos.index');
        }
        else{
            $empleo = new Empleo();
            $empleo->evidencia = $request->evidencia;
            $empleo->mensaje_trabajo = $request->mensaje_trabajo;
            $empleo->emprendimiento_id = 
            $empleo->user_id = auth()->user()->id;
            $empleo->save();

            return redirect()->route('home');
        }

    }

    

    public function edit(Empleo $empleo, ){

        $emprendimientos =Emprendimiento::all();
        $users =User::all();

        return view('empleos.edit', compact('empleo', 'emprendimientos', 'users'));
    }



    public function update(Request $request, Empleo $empleo){

        $request->validate([
            
            'mensaje_trabajo'=>'Required',
            
        ]);


        $empleo->update($request->all());
        $empleos =Empleo::all();
        return view('empleos.index',  compact('empleos'));
    }

    public function destroy(Empleo $empleo){
        $empleo->delete();

        return redirect()->route('empleos.index');
    }


   
    
}
