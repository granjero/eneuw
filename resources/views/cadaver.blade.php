@extends('layout')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-12">
        <div class="card">
            <div class="card-header">
               Cadaver Exquisito 
            </div>
            <div class="card-body">
                <ul class="list-group">
                @foreach($cadaver as $oracion)
                  <li class="list-group-item">{{ $oracion[0] }}</li>
                @endforeach
                </ul>
                <a href="/" class="btn btn-primary my-2">Volver</a>
                <a href="https://docs.google.com/spreadsheets/d/1B0DtvFwFj6qynwHHEJITOzsX9EELk4ZjJWXrYaYqrR8/edit?usp=sharing" class="btn btn-primary my-2" target="_blank"> Ver la hoja de Google <i class="fab fa-google-drive"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
