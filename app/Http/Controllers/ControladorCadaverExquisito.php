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
        $valores = $respuesta->getValues();

        return var_dump($valores);
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
        $valores = [[$request->input("oracion")]];
        $cuerpo = new \Google_Service_Sheets_ValueRange([
            "values" => $valores,
        ]);
        $parametros = [
            "valueInputOption" => "RAW",
        ];
        $insertar = [
            "insertDataOption" => "INSERT_ROWS",
        ];
        $respuesta = $this->googleSheetService()->spreadsheets_values->append(
            $this->spreadsheetID,
            $rango,
            $cuerpo,
            $parametros,
            $insertar
        );
        return var_dump($valores);
    }
}
