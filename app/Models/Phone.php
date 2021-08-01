<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Phone extends Model
{
    use HasFactory;

    // Base de datos y tabla que se va a usar
    protected $table = "telefono";
    protected $primaryKey = 'tel_id';
    protected $fillable = [
        'tel_nro',
        'tel_des',
        'tel_sta',
        'con_id',
    ];

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public $timestamps = false;
}
