@extends('layouts.head')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
@section('content')
<div class="container-fluid">
    <div class="py-3 row justify-content-center">
        <h2>{{$title}}</h2>
    </div>


    <!-- Modal para agregar un proyecto -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true" role="dialog">
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
                            <input class="form-control" type="text" name="id_cliente" id="id_cliente" value="{{$idCliente}}" hidden>
                            <input class="form-control" type="text" name="nombre_cliente" id="nombre_cliente">
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

    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id_cliente</th>
                    <th scope="col">Nombre proyecto</th>
                    <!-- <th scope="col">Razón social</th> -->
                    <th><button type="button" class="btn btn-primary btn-sm" id="agregarProyectoBtn" data-toggle="modal" data-target="#modalAgregar">Agregar nuevo</button></th>
                </tr>
            </thead>
            <tbody>
                @if(empty($proyectos) || $proyectos == "[]")
                <tr>
                    <td colspan="3">
                        <h4>No hay datos</h4>
                    </td>
                </tr>
                @else
                @foreach($proyectos as $proy)
                <tr>
                    <td>{{$proy->id_proyecto}}</td>
                    <td>{{$proy->nombre_proyecto}}</td>
                    <td><a class="btn btn-primary" href="{{url("/proyecto/detalle/$proy->id_proyecto")}}">Ver detalles</a>
                        <button class="btn btn-secondary">Editar</button>
                        <a class="btn btn-danger" href="{{url("/proyecto/eliminar/$proy->id_proyecto/$idCliente")}}">Eliminar</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@extends('layouts.footer')
@section('scripts')

<script>
    $(document).ready(function() {
        var idCliente = $('#id_cliente').val();
        $.ajax({
            url: '{{url("/proyecto/ajax")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'idCliente': idCliente
            },
            type: 'POST',
            success: function(r) {
                // if(r.success == false){
                // console.log("No pues nada brou");
                // }else{
                $('#nombre_cliente').val(r.success.alias_cliente);
                console.log(r.success.alias_cliente);
                // }
            },
            error: function(xhr, status) {
                console.log('Hubo un error');
            }
        });
    });
</script>

@endsection