<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $table = 'equipos';

    protected $primaryKey = 'id_equipos';

    protected $fillable = [
    	'id_marca','id_tipoEquipo','modelo',
    ];

    public function marca()
    {
    	return $this->belongsTo(marca::class, 'id_marca');
    }

    public function tipoEquipo()
    {
    	return $this->belongsTo(tipoEquipo::class, 'id_tipoEquipo');
    }
}
