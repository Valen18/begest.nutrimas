<?php

namespace App;

use App\Firma;
use Illuminate\Database\Eloquent\Model;


class Usuarioxbono extends Model
{
	protected $table = 'usuariosxbonos';

    public function firmas(){
        return $this->hasMany(Firma::class);
    }
}
