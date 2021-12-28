<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class ControladorPreciosMercado extends Controller
{
    function precios() {
        echo "<pre>";
        dump($this->cabcbue());
        dump($this->cacbb());
        dump($this->cacbcr());
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
                $celdaHtml[$j][$cabeceraHtml[$i]] = utf8_decode($detalle->textContent);
                $i = $i >= 2 ? 0 : $i + 1;
                $j += ($llave +1) % count($cabeceraHtml) == 0 ? 1 : 0;
            }
            $tablaBahia[] = $celdaHtml;
        }
        return $tablaBahia;
    }

    // cámara arbitral de cereales bolsa de comercio de rosario
    function cacbcr() {
        $url = 'https://www.cac.bcr.com.ar/es/precios-de-pizarra';
        $dom = new DomDocument();
        $dom->loadHTMLFile($url, LIBXML_NOERROR);
        $finder = new \DomXPath($dom);
        $divRow = $finder->query("//div[contains(@class, 'row')]");
        $tablas = $dom->saveXML($divRow[0]);

        $dom = new DOMDocument();
        $dom->loadHTML($tablas, LIBXML_NOERROR);
        $finder = new \DomXPath($dom);
        $titulos = $finder->query("//h3");

        $titulosTabla = [];
        foreach($titulos as $valor) 
        {
          $titulosTabla[] = utf8_decode(trim($valor->textContent));
        }
        array_shift($titulosTabla); // El primer dato no sirve

        $finder = new \DomXPath($dom);
        $divPrice = $finder->query("//div[@class= 'price']");
        $divPriceSC = $finder->query("//div[@class= 'price-sc']"); // estimativo

        $i = 0;
        foreach($divPrice as $llave => $valor) 
        {
           $datosPrecio[$titulosTabla[$i]][] = utf8_decode(trim($valor->textContent));
           $datosPrecio[$titulosTabla[$i]][] = utf8_decode(trim($divPriceSC[$llave]->textContent));
           $i++;
        }
        return $datosPrecio;
    }
}
