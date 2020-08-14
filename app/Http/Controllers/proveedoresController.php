<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class proveedoresController extends Controller
{
    public function getListaProveedoresAjax(){
        $proovedoresList = Proveedor::all();

        return response()->json($proovedoresList);
    }
}
