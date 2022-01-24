@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
        <div class="card text-center">
            <p>
            <img class="" src="{{ asset('404.png') }}" alt="error 404" width="30%">
            </p>

            <div class="card-header">
               Esto no es un error 404
            </div>
            <div class="card-body">
                <p>Es un puegeot 404</p>
                <a href="/" class="btn btn-primary my-2">Volver al Inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection
