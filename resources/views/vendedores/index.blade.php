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
        <form class="" action="{{url('/agregarVendedor')}}" method="post" enctype="multipart/form-data">
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
        <form class="" action="{{url('/agregarVendedor')}}" method="post" enctype="multipart/form-data">
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
      <?php
        if (empty($vendedores)) {
          echo "No hay datos";
        }else {
          foreach ($vendedores as $vendedor) {
            $nombre = $vendedor->nombre_vendedor." ".$vendedor->apellido_vendedor;
            $foto = $vendedor->foto;
            crearCardVendedor($nombre, $foto);
          }
        }

        function crearCardVendedor($nombre_vendedor, $foto_vendedor){
          echo '<div class="carding">
            <a href="#"><img class="img-card" src="img/'.$foto_vendedor.'" alt=""></a>
            <div class="contenido">
              <p>'.$nombre_vendedor.'</p>
              <div class="mr-auto">
                <a class="btn btn-primary" href="#"> <i class="far fa-edit"></i> </a>
                <a class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
          </div>';
        }
      ?>
      
    </div>
  </div>

</div>

<!-- <p id="texto">Hola</p>
<button type="button" id="button" name="button">button</button> -->

@extends('layouts.footer')
@section('scripts')

<script type="text/javascript">
  $('#button').click(function(){
    $('#texto').html('Funciona');
  })
</script>
@endSection
