<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    public $table = 'problemas';

    protected $primaryKey = 'id_problema';

    public $timestamps = false;
    
    public function detalles()
    {
    	return $this->hasMany(Detalle::class, 'id_problema');
    }

}
