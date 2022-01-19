@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">

    <div class="card">
        <div class="card-header">
            <h2 class="card-title my-2">Precios del Mercado de Granos.</h2></div>
        <div class="card-body">
            <p class="card-text">Precios publicados por las cámaras de cereales para el día {{ date('d-m-Y') }}.</p>

        <h5 class="mt-4">Puerto de Buenos Aires (Dársena)</h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Cereal</th>
                    <th scope="col">Precio en Dólares</th>
                    <th scope="col">Precio en Pesos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($array as $precios)
                    @if($precios['puerto'] == 'Dársena Bs. As.')
                    <tr>
                        <td>{{ $precios['producto'] }}</td>
                        <td>{{ $precios['dolar'] == 0 ? 'S/C' : $precios['dolar'] }}</td>
                        <td>{{ $precios['peso'] == 0 ? 'S/C' : $precios['peso'] }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <h5 class="mt-4">Puerto de Bahía Blanca</h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Cereal</th>
                    <th scope="col">Precio en Dólares</th>
                    <th scope="col">Precio en Pesos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($array as $precios)
                    @if($precios['puerto'] == 'Bahía Blanca')
                    <tr>
                        <td>{{ $precios['producto'] }}</td>
                        <td>{{ $precios['dolar'] == 0 ? 'S/C' : $precios['dolar'] }}</td>
                        <td>{{ $precios['peso'] == 0 ? 'S/C' : $precios['peso'] }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <h5 class="mt-4">Puerto de Rosario</h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Cereal</th>
                    <th scope="col">Precio en Dólares</th>
                    <th scope="col">Precio en Pesos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($array as $precios)
                    @if($precios['puerto'] == 'Rosario')
                    <tr>
                        <td>{{ $precios['producto'] }}</td>
                        <td>{{ $precios['dolar'] == 0 ? 'S/C' : $precios['dolar'] }}</td>
                        <td>{{ $precios['peso'] == 0 ? 'S/C' : $precios['peso'] }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <p>*S/C =  Sin Cotización.</p>
        <a href="/" class="btn btn-primary">Volver</a>
        </div>
    </div>

    </div>
</div>
@endsection
