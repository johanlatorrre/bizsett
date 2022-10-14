<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Buzon;
use App\Http\Requests\StoreBuzon;
use App\Models\User;

class BuzonController extends Controller
{

    public function index(){

        $buzons =Buzon::all();

    return view('buzones.index', compact('buzons'));
    }

    


    public function create(){

        $users =User::all();

        return view('buzones.create', compact('users'));
    }




    public function store(StoreBuzon $request){

        if (auth()->user()->tipopersona_id == '2'){
            $buzon = Buzon::create($request->all());

            return redirect()->route('buzons.index');
        }
        else{
            $buzon = new Buzon();
            $buzon->mensaje = $request->mensaje;
            $buzon->user_id = auth()->user()->id;
            $buzon->save();

            return redirect()->route('home');
        }

    }

    

    public function edit(Buzon $buzon, ){

        $users =User::all();

        return view('buzones.edit', compact('buzon', 'users'));
    }



    public function update(Request $request, Buzon $buzon){

        $request->validate([
            
            'mensaje'=>'Required',
            
        ]);

        
        $buzon->update($request->all());
        $buzons =Buzon::all();
        if (auth()->user()->tipopersona_id == '2'){
            return redirect(route('buzons.index'));
        }else{
            return redirect(route('home'));
        }
    }

    public function destroy(Buzon $buzon){
        $buzon->delete();

        return redirect()->route('buzons.index');
    }


   
    
}
