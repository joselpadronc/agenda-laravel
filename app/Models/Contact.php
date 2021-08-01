<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Base de datos y tabla que se va a usar
    protected $table = "contacto";
    protected $primaryKey = 'con_id';
    protected $fillable = [
        'con_nom',
        'con_dh',
        'con_sta',
        'con_dt',
    ];

    public $timestamps = false;
}
