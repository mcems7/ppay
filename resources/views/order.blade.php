@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mi Tienda</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('order') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="order_code" class="col-md-4 col-form-label text-md-right">{{ __('Buscar orden') }}</label>

                            <div class="col-md-6">
                                <input id="order_code" type="text" class="form-control @error('order_code') is-invalid @enderror" name="order_code" value="{{ old('order_code') }}" required autocomplete="order_code" autofocus>
<button type="submit" class="btn btn-primary">Buscar</button>
                                @error('order_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </form>
                        @if (isset($order) and $order->id!="")
                        
                         <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>order_code</th>
                                    <th>customer_name</th>
                                    <th>customer_email</th>
                                    <th>customer_mobile</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_email}}</td>
                                    <td>{{$order->customer_mobile}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>
                                
                            </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Pagar</button>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
