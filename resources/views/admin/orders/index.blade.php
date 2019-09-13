@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ordenes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->customer_document_type}} {{$order->customer_document}}</td>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_surname}}</td>
                                    <td>{{$order->customer_email}}</td>
                                    <td>{{$order->customer_mobile}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
