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
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=https://ppay-mcems7.herokuapp.com/visitas/{{$id}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
