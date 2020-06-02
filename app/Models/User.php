<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_tipoUsuario','nombre','apellido','dni', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoUsuario()
    {
        return $this->belongsTo(tipoUsuario::class, 'id_tipoUsuario');
    }

    public function apeYNom()
    {
        $apeYNom = $this->apellido.", ".$this->nombre;
        return $apeYNom;
    }

    public function hasRole($role)
    {
        if($this->tipoUsuario->descripcion == $role){
            return true;
        }
        else{
            return false;
        }
    }
}
