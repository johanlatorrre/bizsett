<?php

namespace App\Listeners;

use App\Models\Notificacione;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificacionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $notificaciones = Notificacione::all();
        $cont = 0;

        foreach($notificaciones as $notificacione){
            if($notificacione->user_id == auth()->user()->id){
                        $cont=$cont+1;
            }
        }
               
            
        return view('layouts.plantilla', compact('cont'));

    }
}
