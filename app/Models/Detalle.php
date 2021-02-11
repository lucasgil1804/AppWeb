<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle extends Model
{
    //use SoftDeletes;

    public $table = 'detallereparaciones';

    protected $primaryKey = 'id_detalleReparacion';

    protected $fillable = [
    	'id_reparacion','id_problema','observacion','costo','realizado',
    ];

    public function reparacion()
    {
    	return $this->belongsTo(Reparacion::class, 'id_reparacion');
    }

    public function estado()
    {
    	return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function problema()
    {
        return $this->belongsTo(Problema::class, 'id_problema');
    }
}
