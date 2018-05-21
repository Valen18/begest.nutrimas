<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Role;
use App\Sede;
use App\Http\Requests\UpdateEmpleadoRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EmpleadosController extends Controller
{
   function __construct(){
        $this->middleware('auth', ['except' =>['edit', 'update']]);
        $this->middleware('roles:admin', ['except' =>['edit', 'update']]);
    }

   
    public function index()
    {
        $empleados = Usuario::where('role_id', 2)->get(); // 2 es el id actual del rol EMPLEADO. (Esto hay que mejorarlo para que quede más legible)


        return view('empleados.index', compact('empleados'));
    }

    

    public function edit($id)
    {

        $empleado = Usuario::findOrFail($id);

        $this->authorize('edit', $empleado);

        $sedes = Sede::pluck('nombre','id');

        return view('empleados.editar', compact('empleado', 'sedes'));
    }

    public function store(Request $request)
    {
    	// 1. Almacenar

    	$empleado = Usuario::create($request->all());
    	
        $empleado->sedes()->attach($request->sedes);
        // 2. Redireccionar

        return redirect()->route('empleados.index')->with('info', 'Empleado creado con éxito.');
    }

    public function create(){

        $sedes = Sede::pluck('nombre','id');

    	return view('empleados.crear', compact('sedes'));
    }

     public function update(UpdateEmpleadoRequest $request, $id)
    {
            $empleado = Usuario::findOrFail($id);
            
            $this->authorize('update', $empleado);
        
            if($request->password == "" || password_verify($request->password, $empleado->password)){
                $empleado->update($request->only('nombre', 'email'));   
            }else{
                $empleado->update($request->all());
            }
            $empleado->sedes()->sync($request->sedes);
            // Redireccionar
            return redirect()->route('empleados.index')->with('info', 'Empleado editado con éxito.');;
    }

    public function destroy($id)
    {
        $empleado = Usuario::findOrFail($id);
        $empleado->delete();

         $this->authorize('destroy', $empleado);

        // Redireccionar
        return redirect()->route('empleados.index');
    }
}
