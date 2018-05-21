<?php

namespace App;

use App\Usuarioxbono;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
	 protected $fillable = [
        'usuarioxbono_id',
        'firma',
        'observaciones'
     ];  

    public function usuarioxbonos(){
    	return $this->belongsTo(Usuarioxbono::class);
    }


}
