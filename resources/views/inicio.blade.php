@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
    @include('sobremi')
    @include('contacto')
        <div class="accordion" id="accordion">
            @include('arte.arte')
            @include('juegos')
            @include('trabajo')
        </div>
        <div class="card my-4">
            <div class="card-footer text-muted">
            El código de este proyecto está en mi  perfil de 
            <a href="https://github.com/granjero/eneuw" target="_blank">GitHub <i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
