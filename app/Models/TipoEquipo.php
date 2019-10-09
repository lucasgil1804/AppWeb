<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    public $table = 'tipoequipos';

    protected $primaryKey = 'id_tipoEquipo';

    protected $fillable = [
    	'descripcion',
    ];

    public $timestamps = false;

    public function equipos()
    {
    	return $this->hasMany(Equipo::class, 'id_tipoEquipo');
    }
}
