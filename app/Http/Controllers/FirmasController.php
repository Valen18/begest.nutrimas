<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Bono;
use App\Usuarioxbono;
use App\Firma;
use Illuminate\Http\Request;

class FirmasController extends Controller
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
        // 1 AUMENTAR ASISTENCIA EN LA TABLA USUARIOSXBONOS
        $bono = Usuarioxbono::findOrFail($request->usuarioxbono_id);       
        $bono->increment('asistencia');
            
        // 2 ALMACENAR LA FIRMA
        $firma = Firma::create($request->all());

        return redirect()->route('paciente.show', $request->usuarioActivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratoActivo = Usuarioxbono::findOrFail($id);
        //dd($contratoActivo->firmas);
        $usuarioActivo = Usuario::findOrFail($contratoActivo->usuario_id);
        $bonoActivo = Bono::findOrFail($contratoActivo->bono_id);

        return view('firmas.show', compact('contratoActivo', 'usuarioActivo', 'bonoActivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
