<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden_de_compra extends Model
{
    protected $fillable = ['folio_orden_compra', 'id_proveedor', 'moneda_de_cambio', 'precio_cambio', 'precio_mxn', 'id_proyecto'];
    protected $table = "ordenes_de_compra";
    public $timestamps = false;
    protected $primaryKey = "id_orden_compra";

    public function proyecto(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
