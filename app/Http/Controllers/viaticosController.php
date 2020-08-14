<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viatico;
class viaticosController extends Controller
{
    public function store(Request $request){
        Viatico::create([
            'tipo_viatico' => $request->tipo_viatico,
            'fecha_viatico' => $request->fecha_viatico,
            'costo_viatico' => $request->costo_viatico,
            'id_proyecto' => $request->id_proyecto
        ]);
        // return response()->json($request->all());
        return redirect('/proyecto/detalle/'.$request->id_proyecto);
    }
}
