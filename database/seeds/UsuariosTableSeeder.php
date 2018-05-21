<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::truncate();

        for ($i=1; $i < 1500; $i++) { 
        	Usuario::create([
        		'nombre' => "Paciente {$i}",
        		'email' => "paciente{$i}@email.com",
        		'password' => "123123",
        		'telefono' => "123123123123",
        		'role_id' => "3"
        	]);
        	Usuario::sedes()->attach('2');
        }

    }
}
