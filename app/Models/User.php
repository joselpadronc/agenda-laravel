<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Base de datos y tabla que se va a usar
    protected $table = "usuario";
    protected $primaryKey = 'usu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usu_nom',
        'usu_cla',
        'usu_sta',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usu_cla',
    ];

    public $timestamps = false;

    public static function getUserByUsername($username) {
        return self::select('*')
                ->where('usu_nom', '=', $username)
                ->where('usu_sta', '=', 1)
                ->first();
    }

    public function level() {
        return $this->hasOne(Rol::class);
    }
}
