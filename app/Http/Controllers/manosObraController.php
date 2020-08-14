<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mano_de_obra;

class manosObraController extends Controller
{
    public function store(Request $request){
        Mano_de_obra::create([
            'nombre_trabajador' => $request->nombre_trabajador,
            'costo_obra' => $request->costo_obra,
            'id_proyecto' => $request->id_proyecto
        ]);

        // return response()->json($request->all());
        return redirect('/proyecto/detalle/'.$request->id_proyecto);
    }
}
