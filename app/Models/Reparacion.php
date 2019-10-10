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
    	'id_usuario','id_equipo','fecha_ingreso','fecha_egreso','plazo_estimado','total',
    ];

    public function usuario()
    {
    	return $this->belongsTo(User::class, 'id_usuario');
    }

    public function equipo()
    {
    	return $this->belongsTo(Equipo::class, 'id_equipo');
    }
}
