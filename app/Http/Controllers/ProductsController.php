<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    /**
     * Inicializa la clase ProductsController.
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
        $products = new Products();
        $products->all();
        return view('admin.products.index')->with(["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products;
        $product->product_name = $request->product_name;
        $product->product_photo = $request->product_photo;
        $product->product_price = $request->product_price;
        $product->product_detail = $request->product_detail;
        
        $result = $product->save();
        if($result)
        return redirect()->route('admin.Products.index')->with('success', 'La orden ha sido registrada correctamente.');
        else
        return redirect()->route('admin.Products.index')->with('danger', 'Error, La orden no ha sido registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        return view('admin.products.show')->with(["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = Products::find($id);
         return view('admin.Products.edit')->with(["Product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->product_name = $request->product_name;
        $product->product_photo = $request->product_photo;
        $product->product_price = $request->product_price;
        $product->product_detail = $request->product_detail;
        $result = $product->save();
        if($result)
        return redirect()->route('admin.Products.index')->with('success', 'La orden ha sido actualizada correctamente.');
        else
        return redirect()->route('admin.Products.index')->with('danger', 'Error, La orden no ha sido actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        if ($product->exists === false)
        return redirect()->route('admin.Products.index')->with('success', 'La orden ha sido eliminada correctamente.');
        else
        return redirect()->route('admin.Products.index')->with('danger', 'Error, La orden no ha sido eliminada.');
    }
}

