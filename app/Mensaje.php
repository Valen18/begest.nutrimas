<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Mensaje extends Model
{
	protected $fillable = [
        'paciente_id',
        'empleado_id',
        'mensaje',
        'leido'
     ];  

    protected $table = 'mensajes'; // Nombre de la tabla a usar
}
