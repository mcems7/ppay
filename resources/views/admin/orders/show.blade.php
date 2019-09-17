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
                                    <th>customer_document</th>
                                    <th>order_code</th>
                                    <th>customer_name</th>
                                    <th>customer_surname</th>
                                    <th>customer_email</th>
                                    <th>customer_mobile</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->customer_document_type}} {{$order->customer_document}}</td>
                                    <td><h1>{{$order->order_code}}</h1></td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_surname}}</td>
                                    <td>{{$order->customer_email}}</td>
                                    <td>{{$order->customer_mobile}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>
                                
                            </tbody>
                    </table>
                    
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modalPagar">Pagar</button>
                    <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="modalPagar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seleccione medio de pago</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <ul>
              <li> 
              <form method="POST" action="{{ route('pagar') }}">
                @csrf
                <input type="hidden" name="id" value="{{$order->id}}">
                <input type="hidden" name="customer_document_type}" value="{{$order->customer_document_type}} ">
                <input type="hidden" name="customer_document" value="{{$order->customer_document}}">
                <input type="hidden" name="order_code" value="{{$order->order_code}}">
                <input type="hidden" name="customer_name" value="{{$order->customer_name}}">
                <input type="hidden" name="customer_surname" value="{{$order->customer_surname}}">
                <input type="hidden" name="customer_email" value="{{$order->customer_email}}">
                <input type="hidden" name="customer_mobile" value="{{$order->customer_mobile}}">
                <input type="hidden" name="status" value="{{$order->status}}">
                <button type="submit" class="btn btn-success">PlacetoPay</button>
              </form>
              </li>
              <li>Efectivo en el establecimiento</li>
              <li>Otro</li>
          </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
