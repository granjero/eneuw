<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class ControladorPreciosMercado extends Controller
{
    function precios() {

        dump($this->cabcbue());
        dump($this->cacbb());
    }

    // cámara arbitral de la bolsa de cereales de buenos aires
    function cabcbue() {
        $url = 'http://www.cabcbue.com.ar/webapi/Home/PrecioHoy';
        $json = file_get_contents($url);
        return json_decode($json);
    }

    // cámara arbitral de cereales de bahia blanca
    function cacbb() {
        $url = 'https://cacbb.com.ar/precioscamara.html';
        $dom = new DOMDocument();
        $dom->loadHTMLFile($url, LIBXML_NOERROR);
        $table = $dom->getElementsByTagName('table');
        $tablas = [];

        foreach ($table as $datos) {
            $tablas[] = $dom->saveXML($datos);
        }
        // elimino las ultimas 3 tablas que no importan
        array_pop($tablas);
        array_pop($tablas);
        array_pop($tablas);

        foreach($tablas as $tabla) {
            $elemento = new DOMDocument();
            $elemento->loadHTML($tabla, LIBXML_NOERROR);
            $cabecera = $elemento->getElementsByTagName('th'); 
            $celdas = $elemento->getElementsByTagName('td');
            $cabeceraHtml = [];
            $celdaHtml = [];

            foreach ($cabecera as $nombre) {
                $cabeceraHtml[] = trim($nombre->textContent);
            }
            array_shift($cabeceraHtml); // trae doble header el que sirve es el segundo
            $i = $j = 0;

            foreach($celdas as $llave => $detalle) {
                $celdaHtml[$j][$cabeceraHtml[$i]] = $detalle->textContent;
                $i = $i >= 2 ? 0 : $i + 1;
                $j += ($llave +1) % count($cabeceraHtml) == 0 ? 1 : 0;
            }
            $tablaBahia[] = $celdaHtml;
        }
        return $tablaBahia;
    }
}
