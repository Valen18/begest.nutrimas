<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Role;
use App\Sede;
use DataTables;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdatePacienteRequest;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    
    function __construct(){
        $this->middleware('auth', ['except' =>['edit', 'update']]);
        $this->middleware('roles:admin,empleado', ['except' =>['show', 'edit', 'update']]);

    }

   
    public function index()
    {
        //$pacientes = Usuario::where('role_id', 3)->get(); // 3 es el id actual del rol PACIENTE. (Esto hay que mejorarlo para que quede más legible)
                 
        return view('pacientes.index');
    }

    public function getData(){


        $sedesHabilitadas = auth()->user()->sedes->pluck('id')->toArray();

        $habilitados = array();

       

        $pacientes = Usuario::getPacientes();
        $sedesHabilitadas = auth()->user()->sedes->pluck('id')->toArray();

        $habilitados = array();


         foreach($pacientes as $paciente)
        {
          if( in_array($paciente->sedes->pluck('id')->first(), $sedesHabilitadas))
            {
                array_push($habilitados, $paciente);
            }      
           
        }    


        return Datatables::of($habilitados)
                            ->addColumn('nombre', function ($paciente){
                                return '<a href="paciente/'.$paciente->id.'">'.$paciente->nombre.'</a>';
                            })
                            ->addColumn('editar', function ($paciente)
                            {
                                return '<a href="pacientes/'.$paciente->id.'/edit" class="btn btn-sm btn-primary"><span class="oi oi-pencil" title="pencil" aria-hidden="true"></span>
                                 </a><form class="d-inline-block ml-1" action="'.route("pacientes.destroy", $paciente->id).'" method="POST">
                                        <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit"><span class="oi oi-delete" title="delete" aria-hidden="true"></span></button>
                                    </form>';
                            
                            })
                            ->addColumn('sedes', function (Usuario $usuario)
                            {
                                 return $usuario->sedes()->pluck('nombre')->first();
                            
                            })->rawColumns(['editar', 'nombre'])->make(true);
    }

      





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = Sede::pluck('nombre','id');

        return view('pacientes.crear', compact('sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsuarioRequest $request)
    {
      
       $paciente = Usuario::create($request->all());

       $paciente->sedes()->attach($request->sedes);

       return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Usuario::findOrFail($id);

        $this->authorize('edit', $paciente);

        $sedes = Sede::pluck('nombre','id');

        return view('pacientes.editar', compact('paciente', 'sedes'));
    }

    public function update(UpdatePacienteRequest $request, $id)
    {
            $paciente = Usuario::findOrFail($id);

            $this->authorize('update', $paciente);

            $paciente->update($request->all());
            
            $paciente->sedes()->sync($request->sedes);
            // Redireccionar
            return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Usuario::findOrFail($id);
        $paciente->delete();

        // Redireccionar
        return redirect()->route('pacientes.index');
    }
}
