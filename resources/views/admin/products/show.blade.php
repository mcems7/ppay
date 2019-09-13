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

                    <div class="row">

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
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <form method="POST" action="{{ route('admin.orders.store') }}">
                                <input name="product_id" type="hidden" value="{{$product->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" required autocomplete="customer_name" autofocus>

                                @error('customer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="customer_surname" type="text" class="form-control @error('customer_surname') is-invalid @enderror" name="customer_surname" value="{{ old('customer_surname') }}" required autocomplete="customer_surname" autofocus>

                                @error('customer_surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="customer_document_type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de identificación') }}</label>

                            <div class="col-md-6">
                                <input id="customer_document_type" type="text" class="form-control @error('customer_document_type') is-invalid @enderror" name="customer_document_type" value="{{ count($errors)>0 ? old('customer_document_type') : 'CC' }}" required autocomplete="customer_document_type" autofocus>

                                @error('customer_document_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="customer_document" class="col-md-4 col-form-label text-md-right">{{ __('Identificación') }}</label>

                            <div class="col-md-6">
                                <input id="customer_document" type="text" class="form-control @error('customer_document') is-invalid @enderror" name="customer_document" value="{{ old('customer_document') }}" required autocomplete="customer_document" autofocus>

                                @error('customer_document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="customer_address" type="text" class="form-control @error('customer_address') is-invalid @enderror" name="customer_address" required autocomplete="new-customer_address">

                                @error('customer_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="customer_email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="customer_email" type="email" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email') }}" required autocomplete="customer_email">

                                @error('customer_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="customer_mobile" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="customer_mobile" type="tel" class="form-control @error('customer_mobile') is-invalid @enderror" name="customer_mobile" value="{{ old('customer_mobile') }}" required autocomplete="customer_mobile">

                                @error('customer_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmar Compra') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
