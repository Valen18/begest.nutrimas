<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Fisio;
use Illuminate\Http\Request;

class FisiosController extends Controller
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
    public function create($id)
    {
        
        $paciente = Usuario::findOrFail($id);

        return view('fisioterapia.crear', compact('paciente'));    }

    
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
    public function edit($id)
    {
        
        $fisio = Fisio::findOrFail($id);

         //$this->authorize('edit', $medicion);

        return view('fisioterapia.editar', compact('fisio'));
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
    public function destroy($id)
    {
        return 'Destruir consulta de fisio';
    }


    public function store(Request $request)
    {

        $paciente = Fisio::create($request->all());

        return redirect()->route('paciente.show', $request->usuario_id)->with('info', 'Consulta de Fisioterapia creada con éxito.');
    }

   
}
