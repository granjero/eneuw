<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\ControladorPreciosMercado;
class ControladorInicio extends Controller
{
    //
    function inicio()
    {
        $codigo["obscur"] = file_get_contents(public_path("arte/obscur.js"));
        $codigo["circulos"] = file_get_contents(
            public_path("arte/circulos.js")
        );
        $codigo["floralis"] = file_get_contents(
            public_path("arte/floralis.js")
        );
        $codigo["fuerzaCanejo"] = file_get_contents(
            "https://raw.githubusercontent.com/granjero/FuerzaCanejo/master/src/FuerzaCanejo.ino"
        );
        return view("inicio")->with("codigo", $codigo);
    }
}
