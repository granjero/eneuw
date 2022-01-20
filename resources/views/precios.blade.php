@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title my-2">Precios del Mercado de Granos.</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Precios publicados por las cámaras de cereales para el día {{ date('d-m-Y') }}.</p>
                @foreach($array as $puertos => $datos)
                    <h5 class="mt-4">{{ $datos[0]['puerto'] }}</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 33.33%" scope="col">Cereal</th>
                                <th style="width: 33.33%" scope="col">Precio en Dólares</th>
                                <th style="width: 33.33%" scope="col">Precio en Pesos</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datos as $valores)
                            <tr>
                                <td>{{ $valores['producto'] }}</td>
                                <td>{{ $valores['dolar'] == 0 ? 'S/C' : $valores['dolar'] }}</td>
                                <td>{{ $valores['peso'] == 0 ? 'S/C' : $valores['peso'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p><small>
                   Datos obtenidos de: <a href="{{ $datos[0]['url'] }}" target="_blank">{{ $datos[0]['camara'] }}</a>
                    </small></p>
                @endforeach
                <p>*S/C =  Sin Cotización.</p>
                <a href="/" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
