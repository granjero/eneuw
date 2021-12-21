<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControladorEnviaComentarios extends Controller
{
    function envia(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "email" => ["required", "email"],
            "comentario" => ["required"],
        ]);
        Mail::to("jm@estonoesunaweb.com.ar")->send(new Contacto($request));
        return redirect()
            ->back()
            ->with("correoOK", "Su mensaje se ha enviado correctamente.");
    }
}
