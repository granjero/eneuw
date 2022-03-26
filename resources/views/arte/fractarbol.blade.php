@extends('arte.canvas')
<style>
html, body {
    height: 100%;
}
</style>

@section('titulo')
fractarbol
@endsection

@section('arte')
        <script src="{{ asset('arte/fractarbol.js') }}"></script>
@endsection
