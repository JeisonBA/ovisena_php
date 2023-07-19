@extends('layouts.appwelcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header col-md-12" style="text-align: center;"><h3>{{ __('Bienvenido a Ovisena.php') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{ url('/') }}/inicio">
                        <button type="button" class="btn btn-outline-success" style="width: 60px; height: 52px;"><h2><i class="bi bi-house"></i></h2></button>
                    </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="{{ url('/') }}/quienessomos">
                        <button type="button" class="btn btn-outline-success" style="width: 60px; height: 52px;"><h2><i class="bi bi-person-vcard"></i></h2><h6></h6></button>
                    </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <a href="{{ url('/') }}/acercade">
                        <button type="button" class="btn btn-outline-success" style="width: 60px; height: 52px;"><h2><i class="bi bi-info-circle"></i></h2><h6></h6></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection