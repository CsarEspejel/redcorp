<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ["nombre_proyecto", "id_cliente"];
    protected $table = "proyectos";
    public $timestamps = false;
    protected $primaryKey = "id_proyecto";
}
