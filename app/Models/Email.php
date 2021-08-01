<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Email extends Model
{
    use HasFactory;

    // Base de datos y tabla que se va a usar
    protected $table = "correo";
    protected $primaryKey = 'cor_id';
    protected $fillable = [
        'cor_dir',
        'cor_des',
        'cor_sta',
        'con_id',
    ];

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public $timestamps = false;
}
