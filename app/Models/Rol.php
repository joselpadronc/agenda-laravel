<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Base de datos y tabla que se va a usar
    protected $table = "rol";
    protected $primaryKey = 'rol_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_nom',
        'rol_sta'
    ];

}
