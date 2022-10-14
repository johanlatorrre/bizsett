<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\Request;
use App\Models\User;


class SessionsController extends Controller
{
    public function index(){
        $users = User::all();
    return view('auth.login', compact('users'));
    }

    public function store(){
       

        if(auth()->attempt(request(['email', 'password']))==false ){
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos'
            ]);
        }
    
        return redirect()->route('home');
        
    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('home');
    }
}
