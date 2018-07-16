<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Bono extends Model
{
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuariosxsedes')->withPivot('id')->withTimestamps();
    }
}
