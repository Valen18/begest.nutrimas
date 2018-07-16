<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{

	protected $fillable = [
        'nombre'
    ];
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuariosxsedes');
    }
}
