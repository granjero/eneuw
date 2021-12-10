@extends('arte.canvas')
<style>
html, body {
    height: 100%;
}
</style>

@section('titulo')
circulos
@endsection

@section('arte')
        <script src="{{ asset('arte/circulos.js') }}"></script>
@endsection
