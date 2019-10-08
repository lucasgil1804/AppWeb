<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $table = 'estados';

    protected $primaryKey = 'id_estado';

    public $timestamps = false;

    public function equipos()
    {
    	return $this->hasMany(equipos::class, 'id_estado');
    }
}
