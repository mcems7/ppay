@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Visitas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <!--th>Código</th-->
                                    <th>Fecha Visita</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitas as $visita)
                                <tr>
                                    <td>{{$visita->codigo}}</td>
                                    <!--td><img src="https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=https://ppay-mcems7.herokuapp.com/visitas/{{$visita->codigo}}"></td-->
                                    <td>{{$visita->created_at}}</td>
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
