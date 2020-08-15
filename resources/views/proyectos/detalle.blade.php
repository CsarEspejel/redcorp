@extends('layouts.head')
@section('estilos')

@section('content')
<div class="container-fluid">
    <div class="py-3 row justify-content-center">
        <h2>{{$title}}</h2>
    </div>

    <div class="py-3 row justify-content-center">
        <button class="btn bg-dark text-white mx-2" data-toggle="modal" data-target="#agregarOrden">Agregar Orden de Compra</button>
        <button class="btn bg-dark text-white mx-2" data-toggle="modal" data-target="#agregarViatico">Agregar Viáticos</button>
        <button class="btn bg-dark text-white mx-2" data-toggle="modal" data-target="#agregarObra">Agregar Mano de Obra</button>
    </div>
    <div class="row">
        <table class="table">
            <tbody>
                <tr style="text-align: center; font-weight: bold; font-size:35px;">
                    <td colspan="5">Ordenes de compra</td>
                </tr>
                @if(empty($ordenes) || $ordenes == '[]')
                <tr style="text-align: center; font-weight: bold; font-size:20px;">
                    <td colspan="5">No existen datos</td>
                </tr>
                @else
                <tr style="text-align: center; font-weight: bold;">
                    <td>Folio</td>
                    <td>Proveedor</td>
                    <td>Tipo de cambio</td>
                    <td>Precio en tipo de cambio</td>
                    <td>Precio en MXN</td>
                </tr>
                @foreach($ordenes as $orden)
                <tr style="text-align: center;">
                    <td>{{$orden->folio_orden_compra}}</td>
                    <td>{{$orden->nombre_proveedor}}</td>
                    <td>{{$orden->moneda_de_cambio}}</td>
                    <td>{{$orden->precio_cambio}}</td>
                    <td>{{$orden->precio_mxn}}</td>
                </tr>
                @endforeach
                @endif

                <tr style="text-align: center; font-weight: bold; font-size:35px;">
                    <td colspan="5">Manos de obra</td>
                </tr>
                @if(empty($manos) || $manos == '[]')
                <tr style="text-align: center; font-weight: bold; font-size:20px;">
                    <td colspan="5">No existen datos</td>
                </tr>
                @else
                <tr style="text-align: center; font-weight: bold;">
                    <td colspan="3">Nombre de trabajador</td>
                    <td colspan="2">Costo de la mano de obra</td>
                </tr>
                @foreach($manos as $mano)
                <tr style="text-align: center;">
                    <td colspan="3">{{$mano->nombre_trabajador}}</td>
                    <td colspan="2">{{$mano->costo_obra}}</td>
                </tr>
                @endforeach
                @endif

                <tr style="text-align: center; font-weight: bold; font-size:30px;">
                    <td colspan="5">Viáticos</td>
                </tr>
                @if(empty($viaticos) || $viaticos == '[]')
                <tr style="text-align: center; font-weight: bold; font-size:20px;">
                    <td colspan="5">No existen datos</td>
                </tr>
                @else
                <tr style="text-align: center; font-weight: bold;">
                    <td colspan="2">Tipo de viático</td>
                    <td>Fecha de uso</td>
                    <td colspan="2">Costo</td>
                </tr>
                @foreach($viaticos as $viatico)
                <tr style="text-align: center;">
                    <td colspan="2">{{$viatico->tipo_viatico}}</td>
                    <td>{{$viatico->fecha_viatico}}</td>
                    <td colspan="2">{{$viatico->costo_viatico}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- modal para agregar una orden de compra -->
<div class="modal fade" tabindex="-1" id="agregarOrden" aria-labelledby="ordenLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="ordenLabel">Agregar Orden de Compra</h5>
            </div>
            <form action="{{route('orden.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="id_proyecto" id="id_proyecto" value="{{$id_proyecto}}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="folio_orden">Folio:</label>
                        <input type="text" name="folio_orden" id="folio_orden" class="form-control" placeholder="Escribe el folio">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor:</label>
                        <select class="form-control" name="id_proveedor" id="id_proveedor">
                            <option value="0" selected>Selecciona un proveedor</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="moneda_de_cambio">Tipo de cambio:</label>
                        <select class="form-control" name="moneda_de_cambio" id="moneda_de_cambio">
                            <option value="0">Selecciona uno</option>
                            <option value="USDB">USD Bancomer</option>
                            <option value="USDF">USD Federación</option>
                            <option value="MXN">MXN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="precio_cambio" id="precio_cambio_lbl">Precio en moneda de cambio:</label>
                        <input type="text" name="precio_cambio" id="precio_cambio" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="precio_mxn">Precio en MXN:</label>
                        <input type="text" name="precio_mxn" id="precio_mxn" class="form-control" placeholder="MXN">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- termina modal -->

<!-- modal para agregar un viático -->
<div class="modal fade" tabindex="-1" id="agregarViatico" aria-labelledby="viaticoLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="viaticoLabel">Agregar Viático</h5>
            </div>
            <form action="{{route('viatico.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="id_proyecto" id="id_proyecto" value="{{$id_proyecto}}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipo_viatico">Tipo de viático</label>
                        <select class="form-control" name="tipo_viatico" id="tipo_viatico">
                            <option value="0">Selecciona una opción</option>
                            <option value="hospedaje">Hospedaje</option>
                            <option value="comida">Comida</option>
                            <option value="gasolina">Gasolina</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_viatico">Fecha de uso</label>
                        <input type="date" class="form-control" name="fecha_viatico" id="fecha_viatico">
                    </div>
                    <div class="form-group">
                        <label for="costo_viatico">Costo de viático</label>
                        <input type="text" class="form-control" name="costo_viatico" id="costo_viatico">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- termina modal -->

<!-- modal para agregar una mano de obra -->
<div class="modal fade" tabindex="-1" id="agregarObra" aria-labelledby="obraLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="obraLabel">Agregar Mano de Obra</h5>
            </div>
            <form action="{{route('obra.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="id_proyecto" id="id_proyecto" value="{{$id_proyecto}}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_trabajador">Nombre del trabajador</label>
                        <input type="text" class="form-control" name="nombre_trabajador" id="nombre_trabajador" placeholder="Ingresa el nombre del trabajador">
                    </div>
                    <div class="form-group">
                        <label for="costo_obra">Costo</label>
                        <input type="text" class="form-control" name="costo_obra" id="costo_obra">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- termina modal -->

@extends('layouts.footer')

@section('scripts')

<script>
    $(document).ready(function() {
        $('#precio_cambio_lbl').attr('hidden', true);
        $('#precio_cambio').attr('hidden', true);
        var proveedor = $('#id_proveedor');
        $.ajax({
            url: '{{url("/proveedor/getProveedor")}}',
            type: 'get',
            success: function(r) {
                console.log(r);
                r.forEach(function(element) {
                    proveedor.append('<option value=' + element.id_proveedor + '>' + element.nombre_proveedor + '</option>');
                });
            },
            error: function(xhr, error) {
                console.log(error.message);
            }
        });
    });

    $('#moneda_de_cambio').change(function() {
        if ($('#moneda_de_cambio').val() == "MXN" || $('#moneda_de_cambio').val() == 0) {
            $('#precio_cambio_lbl').attr('hidden', true);
            $('#precio_cambio').attr('hidden', true);
            $('#precio_cambio').val(0);
        } else {
            $('#precio_cambio_lbl').attr('hidden', false);
            $('#precio_cambio').attr('hidden', false);
        }
    });
</script>

@endsection