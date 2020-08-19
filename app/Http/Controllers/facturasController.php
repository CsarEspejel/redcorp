<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;

class facturasController extends Controller
{
    public function store(Request $request){
        Factura::create([
            'razon_social_cliente' => $request->razon_social_value,
            'RFC' => $request->rfc,
            'folio' => $request->folio,
            'tipo_documento' => $request->tipo_documento,
            'fecha_emision' => $request->fecha_emision,
            'monto' => $request->monto,
            'estatus' => $request->estatus,
            'id_proyecto' => $request->id_proyecto
        ]);
        // return response()->json($request->all());
        return redirect('proyecto/detalleFactura/'.$request->id_proyecto);
    }
}
