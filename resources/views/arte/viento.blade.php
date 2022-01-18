@extends('arte.canvas')
<style>
html, body {
    height: 100%;
}
</style>

@section('titulo')
viento
@endsection

@section('arte')
        <script src="{{ asset('arte/viento.js') }}"></script>
@endsection
