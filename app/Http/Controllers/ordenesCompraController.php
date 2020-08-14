<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden_de_compra;

class ordenesCompraController extends Controller
{
    public function store(Request $request){
        if ($request->precio_cambio == 0) {
            $cambio = 0;
        }else{
            $cambio = $request->precio_cambio;
        }
        Orden_de_compra::create([
            'folio_orden_compra' => $request->folio_orden,
            'id_proveedor' => $request->id_proveedor,
            'moneda_de_cambio' => $request->moneda_de_cambio,
            'precio_cambio' => $cambio,
            'precio_mxn' => $request->precio_mxn,
            'id_proyecto' => $request->id_proyecto
        ]);
        // return response()->json($request->all());
        return redirect('/proyecto/detalle/'.$request->id_proyecto);
    }
}
