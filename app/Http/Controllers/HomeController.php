<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Orders;
use GuzzleHttp\Client;

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
//dd($request);
$url = env('API_URL');
$login = env('API_LOGIN');
$trankey = env('API_TRANKEY');
$returnurl = route('response',[$request->order_code]);
//var_dump($returnurl);
//dd($returnurl);
$payload = [
     'base_uri' => $url,
     'auth' => [
         'Login' => $login,
         'TranKey' => $trankey,
         'nonce' => base64_encode($request->order_code),
         'seed' => date('c')
        ],
    'locale' => "en_CO",
    'buyer'=> [
            'name' => $request->customer_name,
            'surname' => $request->customer_surname,
            'email' => $request->customer_email,
            'document' => $request->customer_document,
            'documentType' => $request->customer_document_type,
            'mobile' => $request->customer_mobile
        ],
    'payment' => [
        "reference"=>$request->order_code,
        "description"=>"Pago básico de prueba ".$request->order_code,
        "amount"=>[
                "currency"=> "COP",
                "total"=> "10000"
            ],
        "allowPartial"=>false
    ],
    'expiration' => date('c', strtotime('+2 days')),
    'returnUrl' => $returnurl,
    'ipAddress' => '127.0.0.1',
    'userAgent' => 'PlacetoPay Sandbox'
];

//setup request to send json via POST
$client = new \GuzzleHttp\Client();
$response = $client->request('POST', 'https://test.placetopay.com/redirection/api/session',$payload);
echo $response->getStatusCode();
echo $response->getBody(); 

//$payload = json_encode($payload);
#dd($payload);
#exit();
#dd($url);//https://test.placetopay.com/redirection/api/session/
//dd(is_string($url));//
/*
$client = new Client($payload);
$response = $client->post($payload);
echo $response->getStatusCode(); // 200
echo $response->getBody(); 

if ($response->isSuccessful()) {
    // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
    // Redirect the client to the processUrl or display it on the JS extension
    header('Location: ' . $response->processUrl());
} else {
    // There was some error so check the message and log it
    echo $response->status()->message();
}
#dd($client);
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
        $url = env('API_URL');

        if ($request->has('order_code'))
        {
        $order = Orders::where('order_code',$request->order_code)->get()->first();
        }else{
        $order = new Orders;
        }
        return view('admin.orders.show')->with(["order"=>$order,'url'=>$url]);
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
