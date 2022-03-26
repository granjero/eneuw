<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorEnviaComentarios;
use App\Http\Controllers\ControladorInicio;
use App\Http\Controllers\ControladorPreciosMercado;
use App\Http\Controllers\ControladorCadaverExquisito;

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
Route::get("20print", function () {
    return view("arte.20print");
});
Route::get("fractarbol", function () {
    return view("arte.fractarbol");
});

// cosas
Route::post("cadaverExquisito", [
    ControladorCadaverExquisito::class,
    "agregaOracionCadaverExquisito",
]);

Route::get("preciosDelMercadoDeGranos", [
    ControladorPreciosMercado::class,
    "precios",
]);

Route::get("test", [ControladorPreciosMercado::class, "precios"]);

//Route::get("test", [
//ControladorCadaverExquisito::class,
//"ultimaPalabraCadaverExquisito",
//]);
