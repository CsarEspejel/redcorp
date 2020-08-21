@extends('layouts.head')
@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css/home.css') }}">
@section('content')

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-center">
  <a href="#" class="navbar-brand" style="color:white">Redcorp</a>
  <!-- <a href="#" class="navbar-brand justify-content-center" style="color:white">Area de ventas</a> -->
</nav>
<!-- Termina barra de navegación -->

<div class="contenedor">
  <div class="showcase">
    <p>Sistema de facturación y control de proyectos</p>
    <a class="btn btn-danger" href="{{url('vendedor/')}}">Ver vendedores</a>
  </div>
</div>

<!-- @extends('layouts.footer')
@section('scripts') -->

@endsection
