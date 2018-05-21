<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    protected $table = 'mediciones'; // Nombre de la tabla a usar
    protected $fillable = [
        'usuario_id',
        'peso',
        'grasa',
        'liquido',
        'musculo',
        'metabolismo',
        'g_visceral',
        'indice',
        'edad_fisica',
        'c_pecho',
        'c_cintura',
        'c_cadera',
        'c_brazos',
        'c_pecho',
        'c_piernas',
        'imagen',
        'created_at',       
    ];
   
}
