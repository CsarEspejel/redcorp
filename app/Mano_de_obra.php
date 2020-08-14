<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mano_de_obra extends Model
{
    protected $fillable = ['nombre_trabajador', 'costo_obra', 'id_proyecto'];
    protected $table = "manos_de_obra";
    public $timestamps = false;
    protected $primaryKey = "id_mano_de_obra";
}
