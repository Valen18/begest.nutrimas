<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	function __construct(){
        $this->middleware('auth');
           $this->middleware('roles:admin,empleado', ['except' =>['inicio', 'edit', 'update']]);
    }

    public function inicio(){

    	$tituloHead = 'Escritorio - Begest';
        $usuario = auth()->user();

        if($usuario->hasRoles(['admin','empleado']))
        {
            $pacientes = Usuario::getPacientes();

            $sedesHabilitadas = auth()->user()->sedes->pluck('id')->toArray();
            //dd($pacientes);
            return view('inicio', compact('usuario', 'pacientes','sedesHabilitadas', 'tituloHead'));
        }

        return redirect()->route('paciente.show', $usuario->id );




    	
    }
    
}
