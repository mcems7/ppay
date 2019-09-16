<?php

namespace App\Http\Controllers;

use App\Visitas;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    
    /**
     * Inicializa la clase VisitasController.
     * Verifica si el usuario se encuentra identificado
     * Usa el middleware auth con los parametros auth|guest
     * @return void
     */
     public function __construct()
    {
        #$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas = new Visitas();
        return view('admin.visitas.index')->with(["visitas"=>$visitas->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visita = new Visitas;
        $visita->codigo = $request->codigo;
        $result = $visita->save();
        if($result)
        return redirect()->route('admin.visitas.index')->with('success', 'La visita ha sido registrada correctamente.');
        else
        return redirect()->route('admin.visitas.index')->with('danger', 'Error, La visita no ha sido registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $visita = new Visitas;
        $visita->codigo = $request->codigo;
        $result = $visita->save();
        if($result)
        return redirect()->route('admin.visitas.index')->with('success', 'La visita ha sido registrada correctamente.');
        else
        return redirect()->route('admin.visitas.index')->with('danger', 'Error, La visita no ha sido registrada.');
        /*
        $visita = Visitas::find($id);
        return view('admin.visitas.show')->with(["order"=>$visita]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $visita = Visitas::find($id);
         return view('admin.visitas.edit')->with(["order"=>$visita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visita = Visitas::find($id);
        $visita->codigo = $request->codigo;
        $result = $visita->save();
        if($result)
        return redirect()->route('admin.visitas.index')->with('success', 'La visita ha sido actualizada correctamente.');
        else
        return redirect()->route('admin.visitas.index')->with('danger', 'Error, La visita no ha sido actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visita = Visitas::find($id);
        $visita->delete();
        if ($visita->exists === false)
        return redirect()->route('admin.visitas.index')->with('success', 'La visita ha sido eliminada correctamente.');
        else
        return redirect()->route('admin.visitas.index')->with('danger', 'Error, La visita no ha sido eliminada.');
    }
}

