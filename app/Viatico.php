<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    protected $fillable = ["tipo_viatico", 'fecha_viatico', 'costo_viatico', 'id_proyecto'];
    protected $table = "viaticos";
    public $timestamps = false;
    protected $primaryKey = "id_viatico";
}
