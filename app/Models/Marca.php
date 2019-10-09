<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $table = 'marcas';

    protected $primaryKey = 'id_marca';

    public $timestamps = false;

    public function equipos()
    {
    	return $this->hasMany(Equipo::class, 'id_marca');
    }
}
