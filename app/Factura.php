<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['razon_social_cliente', 'RFC', 'folio', 'tipo_documento', 'fecha_emision', 'monto', 'estatus', 'id_proyecto'];
    protected $table = "facturas";
    public $timestamps = false;
    protected $primaryKey = "id_factura";
}
