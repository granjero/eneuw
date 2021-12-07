<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControladorEnviaComentarios extends Controller
{
    function envia (Request $request){

        Mail::to('jmlombardi@dukarevich.com.ar')->send(new Contacto);
        return 'correo';
    }
}
