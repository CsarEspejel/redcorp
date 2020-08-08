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
