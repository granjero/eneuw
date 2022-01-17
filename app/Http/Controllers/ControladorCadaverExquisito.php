<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ControladorCadaverExquisito extends Controller
{
    private $spreadsheetID = "1B0DtvFwFj6qynwHHEJITOzsX9EELk4ZjJWXrYaYqrR8";

    function googleSheetService()
    {
        $cliente = new \Google\Client();
        $cliente->setApplicationName("test");
        $cliente->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $cliente->setAccessType("offline");
        $cliente->setAuthConfig(Storage::path("credenciales.json.key"));

        return new \Google_Service_Sheets($cliente);
    }

    function leeCadaverExquisito()
    {
        $rango = "CadaverExquisito";
        $respuesta = $this->googleSheetService()->spreadsheets_values->get(
            $this->spreadsheetID,
            $rango
        );
        $cadaver = $respuesta->getValues();

        return $cadaver;
    }

    function ultimaOracionCadaverExquisito()
    {
        $rango = "CadaverExquisito";
        $respuesta = $this->googleSheetService()->spreadsheets_values->get(
            $this->spreadsheetID,
            $rango
        );
        $valores = $respuesta->getValues();

        return $valores[count($respuesta->values) - 1][0];
    }

    function ultimaPalabraCadaverExquisito()
    {
        $rango = "CadaverExquisito";
        $respuesta = $this->googleSheetService()->spreadsheets_values->get(
            $this->spreadsheetID,
            $rango
        );

        $valores = $respuesta->getValues();
        $palabra = explode(" ", $valores[count($respuesta->values) - 1][0]);
        return array_pop($palabra);
    }

    function agregaOracionCadaverExquisito(Request $request)
    {
        $rango = "CadaverExquisito";
        $request->validate(['oracion' => 'required']);
        $valores = [[$this->ultimaPalabraCadaverExquisito() . ' ' . trim($request->input("oracion"))]];
        $cuerpo = new \Google_Service_Sheets_ValueRange([
            "values" => $valores,
        ]);
        $parametros = [
            "valueInputOption" => "RAW",
        ];
        $insertar = [
            "insertDataOption" => "INSERT_ROWS",
        ];
        $this->googleSheetService()->spreadsheets_values->append(
            $this->spreadsheetID,
            $rango,
            $cuerpo,
            $parametros,
            $insertar
        );
        $cadaver = $this->leeCadaverExquisito();
        //return var_dump($valores);
        return view("cadaver")->with('cadaver', $cadaver);
    }
}
