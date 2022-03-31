@extends('arte.canvas')
<style>
html, body {
    height: 100%;
}
</style>

@section('titulo')
noche
@endsection

@section('arte')
        <script src="{{ asset('arte/noche.js') }}"></script>
@endsection
