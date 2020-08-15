<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ["nombre_proyecto", "id_cliente"];
    protected $table = "proyectos";
    public $timestamps = false;
    protected $primaryKey = "id_proyecto";

    public function ordenesCompra(){
        return $this->hasMany(Orden_de_compra::class, 'id_proyecto');
    }

    public function manosObra(){
        return $this->hasMany(Mano_de_obra::class, 'id_proyecto');
    }

    public function viaticos(){
        return $this->hasMany(Viatico::class, 'id_proyecto');
    }

}
