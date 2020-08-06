<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['razon_social_cliente', 'alias_cliente', 'id_vendedor'];
    protected $table = "clientes";
    public $timestamps = false;
    protected $primaryKey = "id_cliente";
}
