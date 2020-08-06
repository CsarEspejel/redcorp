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

}
