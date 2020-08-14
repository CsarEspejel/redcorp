<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;

class proyectosController extends Controller
{
    public function index($idCliente){
        $proyecto = Proyecto::select('proyectos.*')
        ->where('id_cliente', '=', $idCliente)
        ->get();

        // return response()->json($proyectos);
        return view('proyectos.index', ['title'=>'Proyectos', 'proyectos'=>$proyecto, 'idCliente'=>$idCliente]);
    }

    public function show($id_proyecto){
        // $detalle_proyecto = DB::table('compras')->where('id_proyecto_fk', $id_proyecto);
        // $detalle_proyecto = Compra::select('*')->where('id_proyecto_fk', '=', $id_proyecto);
        $detalle_proyecto = Proyecto::select('*')
        ->join('ordenes_de_compra', 'proyectos.id_proyecto', '=', 'ordenes_de_compra.id_proyecto')
        ->join('proveedores', 'proveedores.id_proveedor', '=', 'ordenes_de_compra.id_proveedor')
        ->leftjoin('viaticos', 'proyectos.id_proyecto', '=', 'viaticos.id_proyecto')
        ->leftjoin('manos_de_obra', 'proyectos.id_proyecto', '=', 'manos_de_obra.id_proyecto')
        ->where('proyectos.id_proyecto', '=', $id_proyecto)
        ->get();
        
        return response()->json(array('response'=>$detalle_proyecto));
        // return view('proyectos.detalle', ['title'=>'Detalle Cliente', 'detalles'=>$detalle_proyecto, 'id_proyecto'=>$id_proyecto]);
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
