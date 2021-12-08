<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorEnviaComentarios;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("inicio");
});

// Envia el correo de cometarios
Route::post("enviarComentarios", [ControladorEnviaComentarios::class, "envia"]);

// Artes
Route::get("obscur", function () {
    return view("arte.obscur");
});
Route::get("circulos", function () {
    return view("arte.circulos");
});
Route::get("floralis", function () {
    return view("arte.floralis");
});
