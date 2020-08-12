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

<!-- Modal para agregar un proyecto -->
<div class="modal fade" id="modalAgregarProyecto" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar un nuevo proyecto</h4>
      </div>
      <form action="{{url('proyecto/agregar')}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_proyecto">Nombre de proyecto</label>
            <input class="form-control" type="text" name="nombre_proyecto" id="nombre_proyecto">
          </div>
          <div class="form-group">
            <label for="id_cliente">Cliente</label>
            <select class="form-control" name="id_cliente" id="id_cliente">
              <option value="0" selected>Selecciona un cliente</option>
              
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar</a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Termina modal -->

<!-- Modal para agregar un nuevo cliente -->

<div class="modal fade" tabindex="-1" id="modalAgregarCliente" aria-labelledby="agregarClienteLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="agregarClienteLabel">Agregar un nuevo cliente</h4>
      </div>
      <form action="{{url('/cliente/agregar')}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="rfc_cliente">RFC</label>
            <input type="text" class="form-control" name="rfc_cliente" id="rfc_cliente" placeholder="Ingresa el RFC del cliente">
          </div>
          <div class="form-group">
            <label for="razon_social">Razón social</label>
            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingresa la razón social">
          </div>
          <div class="form-group">
            <label for="alias">Alias</label>
            <input type="text" class="form-control" name="alias" id="alias" placeholder="Ingresa un alias para el registro">
          </div>
          <div class="form-group">
            <label for="id_vendedor">Seleccionar vendedor:</label>
            <select class="form-control" name="id_vendedor" id="id_vendedor">
              <option value="0" selected>Selecciona un vendedor</option>
              
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Termina modal agregar cliente-->

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
    <button class="btn mx-2 py-3 bg-dark text-white" id="agregarVendedor" data-toggle="modal" data-target="#modalAgregarVendedor" name="agregarVendedor">Agregar vendedor</button>
    <button class="btn mx-2 py-3 bg-dark text-white" id="agregarCliente" data-toggle="modal" data-target="#modalAgregarCliente" name="agregarCliente">Agregar cliente</button>
    <button class="btn mx-2 py-3 bg-dark text-white" id="agregarProyecto" data-toggle="modal" data-target="#modalAgregarProyecto" name="agregarProyecto">Agregar proyecto</button>
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
  $('#button').click(function() {
    $('#texto').html('Funciona');
  })
</script>

<!-- Ajax para traer datos de la base y rellenar los dropDown de agregar -->
<script>

$(document).ready(function(){
  var id_vendedor = $("#id_vendedor");
  console.log("Agregar cliente function");
  $.ajax({
    url: '{{url("/vendedor/getVendedor")}}',
    type: 'get',
    success: function(r){
      r.success.forEach(function(element){
        id_vendedor.append('<option value='+element.id_vendedor+'>'+element.nombre_vendedor+' '+element.apellido_vendedor+'</option>');
        // console.log(element.nombre_vendedor);
      });
    },
    error: function(xhr, error){
      console.log("Error: "+error.message);
    }
  });
});

$(document).ready(function(){
  console.log("Agregar proyecto function");
  var id_cliente = $("#id_cliente");
  $.ajax({
    url: '{{url("/cliente/getCliente")}}',
    type: 'get',
    success: function(r){
      r.success.forEach(function(element){
        id_cliente.append('<option value='+element.id_cliente+'>'+element.alias_cliente+'</option>');
      });
    },
    error: function(xhr, error){
      console.log("Error: "+error.message);
    }
  });
});

</script>
@endSection