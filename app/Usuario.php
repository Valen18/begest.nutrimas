<?php

namespace App;

use App\Role;
use App\Sede;
use App\Medicion;
use App\Mensaje;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios'; // Nombre de la tabla a usar
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'role_id',
        'telefono',
        'fecha_nac',
        'sexo',
        'altura',
        'act_lab',
        'act_dep',
        'deportes',
        'vegetariano',
        'como',
        'desayuno',
        'mmanana',
        'almuerzo',
        'merienda',
        'cena',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
    public function sedes()
    {
        return $this->belongsToMany(Sede::class, 'usuariosxsedes');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function bonos()
    {
        return $this->belongsToMany(Bono::class, 'usuariosxbonos')->withPivot('id','asistencia')->withTimestamps();
    }

    public function role(){
    	return $this->belongsTo(Role::class);
    }

    public function mediciones(){
        return $this->hasMany(Medicion::class);
    }

    
    public function hasRoles(array $roles)
    {
        foreach($roles as $role)
        {
           
            if($this->role->nombre === $role)
            {
                return true;
            }

        }
        return false;
    }

   

    public static function getPacientes()
    {
        $pacientes = Usuario::where('role_id', 3)->get();
        
        return $pacientes;
    }
    public function isAdmin()
    {
        return $this->hasRoles(['admin', 'empleado']);
    }

}
