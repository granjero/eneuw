@extends('arte.canvas')
<style>
html, body {
    height: 100%;
}
</style>

@section('titulo')
mas círculos
@endsection

@section('arte')
        <script src="{{ asset('arte/masCirculos.js') }}"></script>
@endsection
