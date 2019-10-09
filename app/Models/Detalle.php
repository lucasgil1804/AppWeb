<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle extends Model
{
    use SoftDeletes;

    public $table = 'detalleReparaciones';

    protected $primaryKey = 'id_detalleReparacion';

    protected $fillable = [
    	'id_reparacion','id_estado','descripcion','costo',
    ];

    public function reparacion()
    {
    	return $this->belongsTo(reparacion::class, 'id_reparacion');
    }

    public function estado()
    {
    	return $this->belongsTo(estado::class, 'id_estado');
    }
}
