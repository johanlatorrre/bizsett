<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudade;
use App\Models\Emprendimiento;
use App\Models\Multimedia;

class MultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1

        $multimedia = new Multimedia();

        $multimedia->url_contenido ="1659206846_pexels-quintin-gellar-313782.jpg";
        $multimedia->publicacion_id ="1";

        $multimedia->save();

        //2

        $multimedia2 = new Multimedia();

        $multimedia2->url_contenido ="1659383709_pexels-stephan-seeber-1261728.jpg";
        $multimedia2->publicacion_id ="2";


        $multimedia2->save();

        //3

        $multimedia3 = new Multimedia();

        $multimedia3->url_contenido ="fondo5.jpg";
        $multimedia3->publicacion_id ="3";

        $multimedia3->save();

        //4

        $multimedia4 = new Multimedia();

        $multimedia4->url_contenido ="pexels-francesco-ungaro-1525041.jpg";
        $multimedia4->publicacion_id ="4";

        $multimedia4->save();

        //5

        $multimedia5 = new Multimedia();

        $multimedia5->url_contenido ="pexels-irina-iriser-1379636.jpg";
        $multimedia5->publicacion_id ="5";

        $multimedia5->save();

        //6

        $multimedia6 = new Multimedia();

        $multimedia6->url_contenido ="pexels-jarod-lovekamp-3791466.jpg";
        $multimedia6->publicacion_id ="6";

        $multimedia6->save();

        //7

        $multimedia7 = new Multimedia();

        $multimedia7->url_contenido ="pexels-vlad-alexandru-popa-1402787.jpg";
        $multimedia7->publicacion_id ="7";

        $multimedia7->save();
    }
        
}
