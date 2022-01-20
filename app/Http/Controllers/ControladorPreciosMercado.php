<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class ControladorPreciosMercado extends Controller
{
    private $array = ["darsena" => [], "bahia" => [], "rosario" => []];

    function precios()
    {
        $this->cabcbue();
        $this->cacbb();
        $this->cacbcr();

        //echo "<pre>";
        //var_dump($this->array);
        return view("precios")->with("array", $this->array);
    }

    // cámara arbitral de la bolsa de cereales de buenos aires
    function cabcbue()
    {
        $url = "http://www.cabcbue.com.ar/webapi/Home/PrecioHoy";
        $json = json_decode(file_get_contents($url));
        for ($i = 0; $i < count($json->Precios); $i++) {
            array_push($this->array["darsena"], [
                "puerto" => "Puerto de Buenos Aires (Dársena)",
                "producto" => $json->Precios[$i]->Producto,
                "dolar" => $json->Precios[$i]->DolarDarsenaEstimado,
                "peso" => $json->Precios[$i]->PesosDarsenaEstimado,
                "url" => $url,
                "camara" =>
                    "Cámara Arbitral de la Bolsa de Cereales de Buenos Aires.",
            ]);
        }
        return $json;
    }

    // cámara arbitral de cereales de bahia blanca
    function cacbb()
    {
        $url = "https://cacbb.com.ar/precioscamara.html";
        $dom = new DOMDocument();
        $dom->loadHTMLFile($url, LIBXML_NOERROR);
        $table = $dom->getElementsByTagName("table");
        $tablas = [];

        foreach ($table as $datos) {
            $tablas[] = $dom->saveXML($datos);
        }
        // elimino las ultimas 3 tablas que no importan
        array_pop($tablas);
        array_pop($tablas);
        array_pop($tablas);

        foreach ($tablas as $tabla) {
            $elemento = new DOMDocument();
            $elemento->loadHTML($tabla, LIBXML_NOERROR);
            $cabecera = $elemento->getElementsByTagName("th");
            $celdas = $elemento->getElementsByTagName("td");
            $cabeceraHtml = [];
            $celdaHtml = [];

            foreach ($cabecera as $nombre) {
                $cabeceraHtml[] = trim($nombre->textContent);
            }
            array_shift($cabeceraHtml); // trae doble header el que sirve es el segundo

            $i = $j = 0;
            foreach ($celdas as $llave => $detalle) {
                $celdaHtml[$j][$cabeceraHtml[$i]] = utf8_decode(
                    $detalle->textContent
                );
                $i = $i >= 2 ? 0 : $i + 1;
                $j += ($llave + 1) % count($cabeceraHtml) == 0 ? 1 : 0;
            }
            $tablaBahia[] = $celdaHtml;
        }

        for ($i = 0; $i < count($tablaBahia[0]); $i++) {
            array_push($this->array["bahia"], [
                "puerto" => "Puerto de Bahía Blanca",
                "producto" => $tablaBahia[0][$i]["Cereal"],
                "dolar" => floatval(trim($tablaBahia[0][$i]['u$s'])),
                "peso" => floatval(trim($tablaBahia[0][$i]['$'])),
                "url" => $url,
                "camara" => "Cámara Arbitral de Cereales de Bahía Blanca",
            ]);
        }
        return $tablaBahia;
    }

    // cámara arbitral de cereales bolsa de comercio de rosario
    function cacbcr()
    {
        $url = "https://www.cac.bcr.com.ar/es/precios-de-pizarra";
        $dom = new DOMDocument();
        $dom->loadHTML($this->html_cacbcr(), LIBXML_NOERROR);
        $finder = new \DomXPath($dom);
        $titulos = $finder->query("//h3");

        $titulosTabla = [];
        foreach ($titulos as $valor) {
            $titulosTabla[] = utf8_decode(trim($valor->textContent));
        }
        array_shift($titulosTabla); // El primer dato no sirve

        $finder = new \DomXPath($dom);
        $divPrice = $finder->query("//div[@class= 'price']");
        $divPriceSC = $finder->query("//div[@class= 'price-sc']"); // estimativo

        $i = 0;
        foreach ($divPrice as $llave => $valor) {
            $datosPrecio[$titulosTabla[$i]][] = trim($valor->textContent);
            $datosPrecio[$titulosTabla[$i]][] = trim(
                $divPriceSC[$llave]->textContent
            );
            $i++;
        }
        foreach ($datosPrecio as $producto => $precios) {
            $pesos =
                $precios[0] == "S/C"
                    ? substr(
                        $precios[1],
                        strpos($precios[1], '$') + 1,
                        strlen($precios[1])
                    )
                    : substr(
                        $precios[0],
                        strpos($precios[0], '$') + 1,
                        strlen($precios[0])
                    );
            $pesos = str_replace(".", "", $pesos);

            array_push($this->array["rosario"], [
                "puerto" => "Puerto de Rosario",
                "producto" => $producto,
                "dolar" => 0,
                "peso" => floatval($pesos),
                "url" => $url,
                "camara" =>
                    "Cámara Arbitral de Cereales de la Bolsa de Rosario",
            ]);
        }
        return $datosPrecio;
    }

    // cámara arbitral de cereales bolsa de comercio de rosario
    function html_cacbcr()
    {
        $arrContextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];
        $url = "https://www.cac.bcr.com.ar/es/precios-de-pizarra";
        $datosPrecio = file_get_contents(
            $url,
            false,
            stream_context_create($arrContextOptions)
        );

        $datosPrecio = substr(
            $datosPrecio,
            strpos($datosPrecio, '<div class="row">'),
            strlen($datosPrecio)
        );

        $datosPrecio = substr(
            $datosPrecio,
            0,
            strpos($datosPrecio, "<small>Córdoba 1402")
        );

        return $datosPrecio;
    }
}
