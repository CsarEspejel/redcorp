@extends('layouts.head')
@section('estilos')

@section('content')


<div class="container-fluid">
    <div class="py-3 row justify-content-center">
        <h2>{{$title}}</h2>
    </div>

    <div class="py-3 row justify-content-center">
        <button class="btn btn-dark text-white mx-2" data-toggle="modal" data-target="#agregarFactura">Agregar Factura</button>
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <th>RFC</th>
                <th>Razón social</th>
                <th>Folio</th>
                <th>Documento</th>
                <th>Fecha de emisión</th>
                <th>Monto</th>
                <th>Estatus</th>
            </thead>
            <tbody>
                @if($facturas == "[]")
                <tr style="text-align: center; font-weight: bold; font-size:20px;">
                    <td colspan="7">No existen datos</td>
                </tr>
                @else
                @foreach($facturas as $factura)
                <tr>
                    <td>{{$factura->RFC}}</td>
                    <td>{{$factura->razon_social_cliente}}</td>
                    <td>{{$factura->folio}}</td>
                    <td>{{$factura->tipo_documento}}</td>
                    <td>{{$factura->fecha_emision}}</td>
                    <td>${{$factura->monto}}</td>
                    <td><select class="form-control" name="status" id="status{{$factura->id_factura}}" onchange="change('status{{$factura->id_factura}}', '{{$factura->id_factura}}');" required>
                            <option value="" selected>{{$factura->estatus}}</option>
                            <option value="Cobrado">Cobrado</option>
                            <option value="Por cobrar">Por cobrar</option>
                            <option value="Vigente">Vigente</option>
                            <option value="Cancelado">Cancelado</option>
                        </select></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para agregar una factura -->
<div class="modal fade" tabindex="-1" id="agregarFactura" aria-labelledby="facturaLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Agregar Factura</h4>
            </div>
            <form action="{{route('factura.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="id_proyecto" id="id_proyecto" value="{{$id_proyecto}}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="razon_social">Razón social</label>
                        <select class="form-control" name="razon_social" id="razon_social">
                            <option value="0">Seleciona uno</option>
                        </select>
                        <input type="text" class="form-control" id="razon_social_value" name="razon_social_value" hidden>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" readonly>
                    </div>
                    <div class="form-group">
                        <label for="folio">Folio</label>
                        <input type="text" class="form-control" id="folio" name="folio">
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo de documento</label>
                        <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" value="Factura" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha_emision">Fecha de emisión</label>
                        <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="text" class="form-control" id="monto" name="monto">
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <select name="estatus" id="estatus" class="form-control" required>
                            <option value="" selected>Selecciona una opción</option>
                            <option value="Cobrado">Cobrado</option>
                            <option value="Por cobrar">Por cobrar</option>
                            <option value="Vigente">Vigente</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Termina modal -->

@extends('layouts.footer')
@section('scripts')

<script>
    $(document).ready(function() {
        var razon = $("#razon_social");
        $.ajax({
            url: '{{url("cliente/getCliente")}}',
            type: 'get',
            success: function(r) {
                r.success.forEach(function(element) {
                    razon.append("<option value=" + element.id_cliente + ">" + element.razon_social_cliente + "</option>");
                });
            },
            error: function(xhr, error) {
                console.log("error: " + error);
            }
        });
    });

    var idCliente = "";
    var razon = $("#razon_social");
    razon.change(function() {
        idCliente = razon.val();
        $.ajax({
            url: '{{url("proyecto/ajax")}}',
            type: 'post',
            data: {
                '_token': "{{csrf_token()}}",
                'idCliente': idCliente
            },
            success: function(r) {
                console.log(r.success.RFC);
                $("#rfc").val(r.success.RFC);
                $("#razon_social_value").val(r.success.razon_social_cliente);
            },
            error: function(xhr, error) {
                console.log("error: " + xhr.message);
            }
        });
    });

    function change(id_select_status, id_factura){
        var estatus = $('#'+id_select_status);
        $.ajax({
            url: '{{route("fact.statUpdt")}}',
            type: 'post',
            data: {
                '_token': '{{csrf_token()}}',
                'id_factura': id_factura,
                'status': estatus.val()
            },
            success: function(r) {
                alert('Se ha cambiado el status a '+estatus.val());
            },
            error: function(xhr, error) {
                alert('Ha ocurrido un error al cambiar el estatus, actualiza la página e intenta de nuevo');
            }
        });
    }
</script>

@endsection