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
        #$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = new Orders();
        return view('admin.orders.index')->with(["orders"=>$orders->all()]);
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
        $order = new Orders;
        $order->order_code = uniqid('O');
        $order->customer_name = $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile;
        $order->customer_address = $request->customer_address;
        $order->status = 'CREATED';//“CREATED, PAYED, REJECTED”
        $result = $order->save();
        if($result)
        return redirect()->route('admin.orders.index')->with('success', 'La orden ha sido registrada correctamente.');
        else
        return redirect()->route('admin.orders.index')->with('danger', 'Error, La orden no ha sido registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::find($id);
        return view('admin.orders.show')->with(["order"=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $order = Orders::find($id);
         return view('admin.orders.edit')->with(["order"=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->customer_name = $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile;
        $order->status = $request->status;//“CREATED, PAYED, REJECTED”
        $result = $order->save();
        if($result)
        return redirect()->route('admin.orders.index')->with('success', 'La orden ha sido actualizada correctamente.');
        else
        return redirect()->route('admin.orders.index')->with('danger', 'Error, La orden no ha sido actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orders::find($id);
        $order->delete();
        if ($order->exists === false)
        return redirect()->route('admin.orders.index')->with('success', 'La orden ha sido eliminada correctamente.');
        else
        return redirect()->route('admin.orders.index')->with('danger', 'Error, La orden no ha sido eliminada.');
    }
}

