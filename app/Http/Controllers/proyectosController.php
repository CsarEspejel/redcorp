<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Factura;
use App\Orden_de_compra;

class proyectosController extends Controller
{
    public function index($idCliente){
        $proyecto = Proyecto::select('proyectos.*')
        ->where('id_cliente', '=', $idCliente)
        ->get();

        // return response()->json($proyectos);
        return view('proyectos.index', ['title'=>'Proyectos', 'proyectos'=>$proyecto, 'idCliente'=>$idCliente]);
    }

    public function showDetail($id_proyecto){
        $datosOrdenes = Orden_de_compra::select('*')
        ->join('proveedores', 'proveedores.id_proveedor', '=', 'ordenes_de_compra.id_proveedor')
        ->where('ordenes_de_compra.id_proyecto', '=', $id_proyecto)
        ->get();
        $datosProyecto = Proyecto::find($id_proyecto);
        $datosManos = $datosProyecto->manosObra;
        $datosViaticos = $datosProyecto->viaticos;
        // return response()->json(array('ordenes'=>$datosOrdenes, 'manos'=>$datosManos, 'viaticos'=>$datosViaticos));
        return view('proyectos.detalleProyecto', ['title'=>'Detalle Proyecto', 'ordenes'=>$datosOrdenes, 'manos'=>$datosManos, 'viaticos'=>$datosViaticos, 'id_proyecto'=>$id_proyecto]);
    }

    public function showFactura($id_proyecto){
        $datosFactura = Factura::all();

        return view('proyectos.detalleFactura', ['title'=>'Detalle Factura', 'facturas'=>$datosFactura, 'id_proyecto'=>$id_proyecto]);
    }

    public function store(Request $request){
        Proyecto::create([
            'nombre_proyecto'=>$request->nombre_proyecto,
            'id_cliente'=>$request->id_cliente
        ]);

        return redirect('/proyecto/'.$request->id_cliente);
    }

    public function destroy($idProyecto, $idCliente){
        Proyecto::destroy($idProyecto);

        return redirect('/proyecto/'.$idCliente);
    }
}
