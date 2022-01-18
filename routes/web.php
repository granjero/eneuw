<?php

use App\Http\Controllers\ControladorCadaverExquisito;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorEnviaComentarios;
use App\Http\Controllers\ControladorInicio;
use App\Http\Controllers\ControladorPreciosMercado;

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

//Route::get("/", function () {
//return view("inicio");
//});

Route::get("/", [ControladorInicio::class, "inicio"]);

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
Route::get("viento", function () {
    return view("arte.viento");
});

Route::post("cadaverExquisito", [
    ControladorCadaverExquisito::class,
    "agregaOracionCadaverExquisito",
]);
//Route::get("test", [ControladorPreciosMercado::class, 'precios']);
Route::get("test", [
    ControladorCadaverExquisito::class,
    "ultimaPalabraCadaverExquisito",
]);
