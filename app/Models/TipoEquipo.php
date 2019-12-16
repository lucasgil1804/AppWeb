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

    // public function reparaciones()
    // {
    //     return $this->hasManyThrough(
    //         Reparacion::class,
    //         Equipo::class,
    //         'id_tipoEquipo', // Foreign key on equipos table...
    //         'id_reparacion', // Foreign key on reparaciones table...
    //         'id_tipoEquipo', // Local key on tipoEquipo table...
    //         'id_equipo' // Local key on equipos table...
    //     );
    // }

    public function reparaciones()
    {
        return $this->hasManyThrough(
            Reparacion::class,
            Equipo::class,
            'id_tipoEquipo', // Foreign key on equipos table...
            'id_equipo', // Foreign key on reparaciones table...
            'id_tipoEquipo', // Local key on tipoEquipo table...
            'id_equipo' // Local key on equipos table...
        );
    }
}
