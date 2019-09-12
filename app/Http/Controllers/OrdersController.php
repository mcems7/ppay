<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    /**
     * Inicializa la clase OrdersController.
     * Verifica si el usuario se encuentra identificado
     * Usa el middleware auth con los parametros auth|guest
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = new Orders();
        $orders->all();
        return view('admin.orders.index')->with(["orders"=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //“CREATED, PAYED, REJECTED”
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
//

    public function index(Request $request)
    {
         $crud = new Crud();
         $this->fac = new Fac();
         $resultado = $crud->buscar($request,$this->fac);
         if (isset($_REQUEST['json'])){
         return $resultado;
         }else{
         return view('admin.facultad.index')->with(["resultado"=>$resultado]);
         }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.facultad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacRequest $request)
    {
        $fac = new Fac;
        $fac->id = $request->id;
        $fac->nom_fac = $request->nom_fac;
        $result = $fac->save();
        if($result)
        return Redirect::to('admin/facultad')->with('success', 'La Facultad ha sido registrada correctamente.');
        else
        return Redirect::to('admin/facultad')->with('danger', 'Error, La Facultad no ha sido registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function show(Fac $fac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fac = Fac::find($id);
        return view("admin.facultad.editar")->with(["fac"=>$fac]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function update(FacRequest $request, $id)
    {
        $fac = Fac::find($id);
        $fac->nom_fac = $request->nom_fac;
        $result = $fac->save();
        if($result)
        return Redirect::to('admin/facultad')->with('success', 'La Facultad ha sido mdificada correctamente.');
        else
        return Redirect::to('admin/facultad')->with('danger', 'Error, La Facultad no ha sido mdificada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $fac = fac::find($id);
    $fac->delete();
    if ($fac->exists === false)
    return Redirect::to('admin/facultad')->with('success', 'La Facultad ha sido eliminada correctamente.');
    else
    return Redirect::to('admin/facultad')->with('danger', 'Error, La Facultad no ha sido eliminada.');
    }