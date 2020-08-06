@extends('layouts.head')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
@section('content')
<div class="container-fluid">
    <div class="py-3 row justify-content-center">
        <h2>{{$title}}</h2>
    </div>

    <!-- Modal para agregar un nuevo cliente -->

    <div class="modal fade" tabindex="-1" id="modalAgregar" aria-labelledby="agregarClienteLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="agregarClienteLabel">Agregar un nuevo cliente</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('/clientes/agregar')}}" method="post">
                        <div class="form-group">
                            <label for="razon_social">Razón social</label>
                            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingresa la razón social">
                        </div>
                        <div class="form-group">
                            <label for="alias">Alias</label>
                            <input type="text" class="form-control" name="alias" id="alias" placeholder="Ingresa un alias para el registro">
                        </div>
                        <div class="form-group">
                            <label for="id_vendedor">Asignar a vendedor:</label>
                            <input type="text" class="form-control" name="id_vendedor" id="id_vendedor" value="{{$vendedor}}" hidden>
                            <input type="text" class="form-control" name="nombre_vendedor" id="nombre_vendedor" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Termina modal -->

    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id_cliente</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Razón social</th>
                    <th><button type="button" class="btn btn-primary btn-sm" id="agregarClienteBtn" data-toggle="modal" data-target="#modalAgregar">Agregar nuevo</button></th>
                </tr>
            </thead>
            <tbody>
                @if(empty($clientes) || $clientes == "[]")
                <tr>
                    <td colspan="4"><h1>No hay datos disponibles</h1></td>
                </tr>
                @else
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id_cliente}}</td>
                    <td>{{$cliente->alias_cliente}}</td>
                    <td>{{$cliente->razon_social_cliente}}</td>
                    <td><button class="btn btn-success">Ver</button>
                        <button class="btn btn-success">Editar</button>
                        <button class="btn btn-danger">Eliminar</button></td>
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

$("#agregarClienteBtn").click(function(){
    var idVendedor = $('#id_vendedor').val();
    $.ajax({
        url: '/ajax/',
        data: {
            '_token': '{{csrf_token()}}',
            'idVendedor': idVendedor
        },
        type: 'POST',
        success : function(r){
            // if(r.success == false){
                // console.log("No pues nada brou");
            // }else{
                $('#nombre_vendedor').val(r.success.nombre_vendedor + " " + r.success.apellido_vendedor);
                console.log(r.success.nombre_vendedor + " " + r.success.apellido_vendedor);
            // }
        },
        error: function(xhr, status){
            console.log('Hubo un error');
        }
    });
});

</script>

@endsection