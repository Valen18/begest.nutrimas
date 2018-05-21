<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuariosxsedes');
    }
}
