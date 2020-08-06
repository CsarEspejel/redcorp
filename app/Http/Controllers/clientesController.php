<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class clientesController extends Controller
{
    public function index($idVendedor){
        $cliente = Cliente::select('clientes.*')
        ->where('clientes.id_vendedor', '=', $idVendedor)
        ->get();

        // return response()->json($cliente);
        return view('clientes.index', ['title'=>'Clientes', 'clientes'=>$cliente, 'vendedor'=>$idVendedor]);
    }

    public function store(Request $request){
        // $datosCliente = $request->all();
        $razon_social_cliente = $request->razon_social;
        $alias_cliente = $request->alias;
        $id_vendedor = $request->id_vendedor;
        Cliente::create([
            'razon_social_cliente'=>$razon_social_cliente,
            'alias_cliente'=>$alias_cliente,
            'id_vendedor'=>$id_vendedor
        ]);
        return redirect('/cliente/'.$id_vendedor);
    }

    public function destroy($id_cliente, $idVendedor){
        Cliente::destroy($id_cliente);

        return redirect('/cliente/'.$idVendedor);
    }
}
