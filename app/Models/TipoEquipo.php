<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    public $table = 'tipoequipos';

    protected $primaryKey = 'id_tipoEquipo';

    public $timestamps = false;

    public function equipos()
    {
    	return $this->hasMany(equipos::class, 'id_tipoEquipo');
    }
}
