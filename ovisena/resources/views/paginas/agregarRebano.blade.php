@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Rebaños') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/rebano/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Nom_rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebaño:') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_rebano" type="text" class="form-control @error('Nom_rebano') is-invalid @enderror"
                                name="Nom_rebano" value="" required autocomplete="Nom_rebano">

                                @error('Nom_rebano')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="datetime-local" class="form-control @error('Fecha') is-invalid @enderror"
                                name="Fecha" value="" required autocomplete="Fecha" autofocus>

                                @error('Fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Cant_ovinos" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad de ovinos:') }}</label>

                            <div class="col-md-6">
                                <input id="Cant_ovinos" type="text" class="form-control @error('Cant_ovinos') is-invalid @enderror"
                                name="Cant_ovinos" value="" required autocomplete="Cant_ovinos">

                                @error('Cant_ovinos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection