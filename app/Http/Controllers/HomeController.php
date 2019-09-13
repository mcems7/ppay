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
    
    public function response($id)
    {
        dd($id);
        return view('response');
    }
    
    public function pagar(Request $request)
    {
    //API URL
$url = 'https://test.placetopay.com/redirection/api/session/';

//create a new cURL resource
#$ch = curl_init($url);

//setup request to send json via POST
$auth = array(
    'Login' => '6dd490faf9cb87a9862245da41170ff2',
    'TranKey' => '024h1IlD',
    'nonce' => $request->order_code,
    'seed' => date ("Y-m-d\TH:i:sP")

);
$locale = array("en_CO",'buyer'=> array(
    'name' => $request->customer_name,
    'surname' => $request->customer_surname,
    'email' => $request->customer_email,
    'document' => $request->customer_document,
    'documentType' => $request->customer_document_type,
    'mobile' => $request->customer_mobile
));
$payment = array(
    "reference"=>$request->order_code,
    "description"=>"Pago básico de prueba 04032019",
    "amount"=>array(
            "currency"=> "COP",
            "total"=> "10000"),
    "allowPartial"=>false
);

$payload = json_encode(array(
    "auth" => $auth,
    "locale" => $locale,
    "payment" => $payment, 
    "expiration"=>date ("Y-m-d\TH:i:sP"),//sumar tiempo 
    "returnUrl"=>route('response',[$request->order_code]),
    "ipAddress" =>"127.0.0.1",
    "userAgent" =>"PlacetoPay Sandbox"
    ));
dd($payload);
exit();
/*

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);
  */
  }
    
    /**
    *
    * Modo pruebas: https://test.placetopay.com/redirection/api/session/
    * Modo producción: https://secure.placetopay.com/redirection/api/session/
    *
    */
    public function order(Request $request)
    {
        $url = 'https://test.placetopay.com/redirection/api/session/';

        if ($request->has('order_code'))
        {
        $order = Orders::where('order_code',$request->order_code)->get()->first();
        }else{
        $order = new Orders;
        }
        return view('order')->with(["order"=>$order,'url'=>$url]);
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
