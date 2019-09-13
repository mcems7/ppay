@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis productos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$product->product_name}}</h3>
                                </div>
                                <div class="panel-body">
                                    <img class="lazy-load" width="284" height="284" src="{{secure_asset($product->product_photo)}}">
                                </div>
                                <div class="panel-footer">
                                    <div class="descripcion">{{$product->product_detail}}</div>
                                    <div style="color: #333;font-size: 24px;line-height: 1.2;font-family:Helvetica,Roboto,Arial,sans-serif;">
                                        <span class="simbolo">$</span>&nbsp;<span class="dinero">{{$product->product_price}}</span>
                                        <a class="btn btn-primary text-center" href="{{route('admin.products.show',[$product->id])}}">Comprar</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection