@extends('layouts.head')
@section('estilos')
<link rel="stylesheet" href="css/main.css">
@section('content')
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-center">
  <a href="#" class="navbar-brand" style="color:white">Redcorp</a>
  <!-- <a href="#" class="navbar-brand justify-content-center" style="color:white">Area de ventas</a> -->
</nav>
<!-- Termina barra de navegación -->

<!-- Modal para agregar nuevo vendedor -->
<div class="modal fade" id="modalAgregarVendedor" tabindex="-1" role="dialog" aria-labelledby="agregarVendedorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarVendedorLabel">Agregar nuevo vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="{{url('/vendedor/agregar')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nombre_vendedor">Nombre del vendedor</label>
            <input class="form-control" type="text" id="nombre_vendedor" name="nombre_vendedor" value="" placeholder="Ej. Pedro">
          </div>
          <div class="form-group">
            <label for="apellido_vendedor">Apellido del vendedor</label>
            <input class="form-control" type="text" id="apellido_vendedor" name="apellido_vendedor" value="" placeholder="Ej. Pérez">
          </div>
          <div class="form-group">
            <label for="identificador_vendedor">Identificador del vendedor</label>
            <input class="form-control" type="text" id="identificador_vendedor" name="identificador_vendedor" value="" placeholder="Ej. 65423174">
          </div>
          <div class="form-group">
            <label for="foto_vendedor">Foto</label>
            <input type="file" id="foto_vendedor" name="foto_vendedor" class="form-control-file">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="button">Guardar</button>
        <button type="button" class="btn btn-danger" name="button" aria-label="close" data-dismiss="modal">Cancelar</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- Termina modal para agregar nuevo vendedor -->

<!-- Modal para modificar vendedor -->
<div class="modal fade" id="modalEditarVendedor" tabindex="-1" role="dialog" aria-labelledby="editarVendedorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarVendedorLabel">Editar vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="{{url('/vendedor/editar')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nombre_vendedor_editar">Nombre del vendedor</label>
            <input class="form-control" type="text" id="nombre_vendedor_editar" name="nombre_vendedor_editar" value="" placeholder="Ej. Pedro">
          </div>
          <div class="form-group">
            <label for="apellido_vendedor">Apellido del vendedor</label>
            <input class="form-control" type="text" id="apellido_vendedor_editar" name="apellido_vendedor_editar" value="" placeholder="Ej. Pérez">
          </div>
          <div class="form-group">
            <label for="identificador_vendedor">Identificador del vendedor</label>
            <input class="form-control" type="text" id="identificador_vendedor_editar" name="identificador_vendedor_editar" value="" placeholder="Ej. 65423174">
          </div>
          <div class="form-group">
            <label for="foto_vendedor">Foto</label>
            <input type="file" id="foto_vendedor" name="foto_vendedor" class="form-control-file">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="button">Guardar</button>
        <button type="button" class="btn btn-danger" name="button" aria-label="close" data-dismiss="modal">Cancelar</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- Termina modal para modificar vendedor -->

<div class="container-fluid">
  <div class="row justify-content-center">
    <h3>Área de ventas</h3>
  </div>
  <div class="container-fluid row justify-content-center py-4">
    <button type="button" class="btn btn-success" id="agregarVendedor" data-toggle="modal" data-target="#modalAgregarVendedor" name="agregarVendedor">Agregar vendedor</button>
  </div>
  <div class="container" style="margin-top:50px;">
    <div class="contanier row">

      @foreach ($vendedores as $vendedor)
        <!-- $nombre = $vendedor->nombre_vendedor." ".$vendedor->apellido_vendedor;
        $foto = $vendedor->foto;
        $id = $vendedor->id_vendedor; -->

        <div class="carding">
          <a href="{{url("/cliente/$vendedor->id_vendedor")}}"><img class="img-card" src="img/{{$vendedor->foto}}" alt=""></a>
          <div class="contenido">
            <p>{{$vendedor->nombre_vendedor}} {{$vendedor->apellido_vendedor}}</p>
            <div class="mr-auto">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarVendedor" onclick="editarModal($datosEditar)"> <i class="far fa-edit"></i> </button>
              <a class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$vendedor->id_vendedor}}"> <i class="fas fa-trash"></i> </a>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalEliminar{{$vendedor->id_vendedor}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="modalEliminarLabel">Eliminar vendedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </div>
              <div class="modal-body">
                <h5>¿Estás seguro de que quieres eliminar a {{$vendedor->nombre_vendedor}} {{$vendedor->apellido_vendedor}}?</h5>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" aria-label="close" data-dismiss="modal">Cancelar</button>
                <form action="{{url("/vendedor/eliminar/$vendedor->id_vendedor")}}" method="get">
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>

</div>

<!-- <p id="texto">Hola</p>
<button type="button" id="button" name="button">button</button> -->

@extends('layouts.footer')
@section('scripts')

<script src="{{asset("/vendor/js/acciones.js")}}"></script>

<script type="text/javascript">
  $('#button').click(function(){
    $('#texto').html('Funciona');
  })
</script>
@endSection
