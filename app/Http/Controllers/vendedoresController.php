<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vendedor;

class vendedoresController extends Controller
{
    //
    public function index(){
      $vendedores = Vendedor::all();
      return view('vendedores.index', ['vendedores'=>$vendedores, 'title'=>'Vendedores']);
    }

    public function store(Request $request){
      $datos = $request->all();
      $nombre = $datos['nombre_vendedor'];
      $apellido = $datos['apellido_vendedor'];
      $identificador = $datos['identificador_vendedor'];
      $foto = $request->file('foto_vendedor');
      $nombre_foto = $foto->getClientOriginalName();
      // $path = $foto->store('public/img');
      $foto->move('img',$nombre_foto);
      Vendedor::create([
        'nombre_vendedor' => $nombre,
        'apellido_vendedor' => $apellido,
        'numero_de_vendedor' => $identificador,
        'foto' => $nombre_foto,
      ]);
      // echo "nombre: $nombre <br /> apellido: $apellido <br /> identificador: $identificador <br /> foto: $foto <br /> $nombre_foto <br />";
      // return redirect()->route('vendedores.index');
      return redirect('/vendedor');
    }

    // public function update(Request $request){

    //   Vendedor::find();
    // }

    public function destroy($id){
      // $vendedor = Vendedor::find($id);
      // $vendedor->delete();

      Vendedor::destroy($id);

      return redirect('/vendedor');
    }

    public function getVendedorAjax(Request $request){
      
      // if(preg_match("/^[0-9]$/", $request->idVendedor)){
        $respuesta = Vendedor::find($request->idVendedor);
      // }else{
        // $respuesta = false;
      // }

      return response()->json(array('success'=>$respuesta));
    }

    public function getListaVendedoresAjax(){
      $vendedores = Vendedor::all();

      return response()->json(array('success'=>$vendedores));
    }
}
