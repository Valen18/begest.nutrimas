<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Role;
use App\Sede;
use App\Medicion;

use Illuminate\Http\Request;

class MedicionController extends Controller
{
    
	 function __construct(){
        $this->middleware('auth', ['except' =>['edit', 'update']]);
        $this->middleware('roles:admin,empleado', ['except' =>['show', 'edit', 'update']]);

    }

	public function create($id){
		
		$paciente = Usuario::findOrFail($id);
		
		//$this->authorize('create', $paciente);

		return view('mediciones.crear', compact('paciente'));
	}

	public function edit($id){


		$medicion = Medicion::findOrFail($id);

		 //$this->authorize('edit', $medicion);

		return view('mediciones.editar', compact('medicion'));
	}

	public function update(Request $request){
		
            $medicion = Medicion::findOrFail($request->id);

            //$this->authorize('update', $medicion);

            $medicion->update($request->all());
          
		    return redirect()->route('paciente.show', $medicion->usuario_id)->with('info', 'Medición modificada con éxito.');;
	}

    public function store(Request $request)

    {
    	$medicion = Medicion::create($request->all());

    	//$this->authorize('store', $medicion);

        return redirect()->route('paciente.show', $medicion->usuario_id);
    }

    public function destroy($id)
    {
        $medicion = Medicion::findOrFail($id);

        //$this->authorize('destroy', $medicion);

        $medicion->delete();

        // Redireccionar
        return redirect()->route('paciente.show', $medicion->usuario_id)->with('info', 'Medición eliminada con éxito.');;
    }
}
