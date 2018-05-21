<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Bono;
use Illuminate\Http\Request;

class BonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAsign($id)
    {
        
        $bono = Bono::findOrFail($id);

         //$this->authorize('edit', $medicion);

        return view('bonos.editarAsign', compact('bono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAsign($id)
    {
        return 'Destruir asignacion de bono';
    }

    public function asignar($id)
    {
        $paciente = Usuario::findOrFail($id);

        $bonos = Bono::all();

        return view('bonos.asignar', compact('paciente', 'bonos'));
    }

    public function asignausuario(Request $request, $id)
    {

       $paciente = Usuario::findOrFail($id);

       $paciente->bonos()->attach($request->bonos);

       return redirect()->route('paciente.show', $id)->with('info', 'Bono asignado con éxito.');
    }

    public function asistencia(Request $request, $id)
    {
        
        $paciente = Usuario::findOrFail($id);
        
       
        foreach($paciente->bonos as $bono){
               
            if($bono->pivot->id == $request->bonos)
            {   
                $bono->pivot->increment('asistencia');
            }
            
        }
       
        dd($paciente->bonos);
        return redirect()->route('paciente.show', $id.'#bonos')->with('info', 'Asistencia asignada con éxito.');
    }
}
