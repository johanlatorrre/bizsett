<?php

namespace App\Http\Controllers;

use App\Events\NotificacionEvent;
use App\Models\Emprendimiento;
use App\Models\Notificacione;
use App\Models\Publicacione;
use App\Models\User;
use Illuminate\Http\Request;

class NotificacioneController extends Controller
{
    public function conteo(){
        $notificaciones = Notificacione::all();
        $cont = 0;

        foreach($notificaciones as $notificacione){
            if($notificacione->user_id == auth()->user()->id){
                        $cont=$cont+1;
            }
        }

        return $cont;
        //return redirect()->route('home');
        
    }

    public function notificaciones(Publicacione $publicacione){

        $users = User::all();
        $emprendimientos = Emprendimiento::all();
        
        foreach($emprendimientos as $emprendimiento){
            if($emprendimiento->id == $publicacione->emprendimiento_id){
                foreach($users as $user){
                    if($user->id == $emprendimiento->user_id){

                        $notificacione = new Notificacione();

                        $notificacione->tiponotificacion_id = '1';
                        $notificacione->user_id = $user->id;
                        $notificacione->save();

                    }
                    
                }
            }
        }

        event(new NotificacionEvent($notificacione));
        
        return redirect()->route('conteo');
        //return redirect()->route('home');
    }


}
