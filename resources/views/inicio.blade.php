@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
    @include('sobremi')
    @include('contacto')

<div class="accordion" id="accordion">
    @include('arte.arte')
    @include('juegos')
</div>
    </div>
</div>
@endsection
