@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
        <div class="card text-center">
            <div class="card-header">
                <p>
                    <img class="mt-3" src="{{ asset('404.png') }}" alt="error 404" width="35%">
                </p>
                <h5>Esto no es un error 404</h5>   
            </div>
            <div class="card-body">
                <p>Es un puegeot 404</p>
                <p class="text-secondary">(La página que buscás no existe.)</p>
                <a href="/" class="btn btn-primary my-2">Volver al Inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection
