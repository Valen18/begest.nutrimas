<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Medicion;
use App\Role;
use App\Sede;
use App\Bono;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
     function __construct(){
        $this->middleware('auth', ['except' =>['edit', 'update']]);
        $this->middleware('roles:admin,empleado', ['except' =>['show', 'edit', 'update']]);

    }
    public function index()
    {
        return redirect()->route('pacientes.index');
    }

    public function show($id)
    {
        $paciente = Usuario::findOrFail($id);
        //dd($paciente->empleado->nombre); -> Empleado que lo crea y lo lleva
        $mediciones = array_column(Medicion::where('usuario_id', $paciente->id)->orderBy('created_at', 'asc')->get()->toArray(), 'created_at');

        $peso = array_column(Medicion::where('usuario_id', $paciente->id)->orderBy('created_at', 'asc')->get()->toArray(), 'peso');

        $grasa = array_column(Medicion::where('usuario_id', $paciente->id)->orderBy('created_at', 'asc')->get()->toArray(), 'grasa');

        $musculo = array_column(Medicion::where('usuario_id', $paciente->id)->orderBy('created_at', 'asc')->get()->toArray(), 'musculo');
     
        $this->authorize('show', $paciente);
        return view('paciente.mostrar', compact('paciente', 'mediciones','peso','grasa','musculo'));
    }

    

}
