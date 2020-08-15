<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedores";
    public $timestamps = false;
    protected $primaryKey = "id_proveedor";

    public function ordenesCompra(){
        return $this->hasMany(Orden_de_compra::class, 'id_proveedor');
    }
}
