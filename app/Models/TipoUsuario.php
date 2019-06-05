<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
	public $table = 'tipousuarios';

	protected $primaryKey = 'id_tipoUsuario';

    public $timestamps = false;

    public function users()
    {
    	return $this->hasMany(User::class, 'id_tipoUsuario');
    }
}
