<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Fisio extends Model
{
	protected $table = 'fisioterapia'; // Nombre de la tabla a usar
	protected $fillable = [
		'usuario_id',
        'tratamiento',
        'evoeva',
        'evotonomusc',
        'observaciones'
    ];  
    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }
}
