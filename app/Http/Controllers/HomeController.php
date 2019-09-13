<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Orders;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function order(Request $request)
    {
        
        if ($request->has('order_code'))
        {
        $order = Orders::where('order_code',$request->order_code)->get()->first();
        }else{
        $order = new Orders;
        }
        return view('order')->with(["order"=>$order]);
    }
    
        public function welcome()
    {
        $products = new Products();
        return view('welcome')->with(["products"=>$products->all()]);
    }
    public function show($id)
    {
        return view('admin.products.show');
    }
}
