<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparacion extends Model
{
	use SoftDeletes;

    public $table = 'reparaciones';

    protected $primaryKey = 'id_reparacion';

    protected $fillable = [
    	'id_usuario','id_equipo','id_estado','fecha_ingreso','fecha_egreso','plazo_estimado','total',
    ];

    public function usuario()
    {
    	return $this->belongsTo(User::class, 'id_usuario');
    }

    public function equipo()
    {
    	return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'id_reparacion');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}
