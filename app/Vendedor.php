<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    protected $fillable = ['nombre_vendedor', 'apellido_vendedor', 'numero_de_vendedor','foto'];
    protected $table = 'vendedores';
    public $timestamps = false;
    protected $primaryKey = "id_vendedor";
}
