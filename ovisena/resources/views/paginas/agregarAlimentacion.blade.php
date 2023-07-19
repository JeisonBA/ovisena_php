@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Agregar Alimentaciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/alimentacion/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Fec_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fec_inicio" type="datetime-local" class="form-control @error('Fec_inicio') is-invalid @enderror"
                                name="Fec_inicio" value="" required autocomplete="Fec_inicio" autofocus>

                                @error('Fec_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="Fec_final" class="col-md-4 col-form-label text-md-end">{{ __('Fecha final:') }}</label>

                            <div class="col-md-6">
                                <input id="Fec_final" type="datetime-local" class="form-control @error('Fec_final') is-invalid @enderror"
                                name="Fec_final" value="" required autocomplete="Fec_final" autofocus>

                                @error('Fec_final')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="Tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo:') }}</label>

                            <div class="col-md-6">
                            <select id="Tipo" class="form-control @error('Tipo') is-invalid @enderror" name="Tipo"
                            value="" required autocomplete="Tipo" autofocus>
                                    <option value="">Selecciona uno...</option>
                                    <option value="Concentrado">Concentrado</option>
                                    <option value="Salvado">Salvado</option>
                                    <option value="Salmineralizada">Sal mineralizada</option>
                                </select>
                                @error('Tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad(Kilos):') }}</label>

                            <div class="col-md-6">
                                <input id="Cantidad" type="number" class="form-control @error('Cantidad') is-invalid @enderror"
                                name="Cantidad" value="" required autocomplete="Cantidad" autofocus>

                                @error('Cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Reporte" class="col-md-4 col-form-label text-md-end">{{ __('Reporte:') }}</label>

                            <div class="col-md-6">
                                <input id="Reporte" type="text" class="form-control @error('Reporte') is-invalid @enderror"
                                name="Reporte" value="" required autocomplete="Reporte" autofocus>

                                @error('Reporte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Id_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del responsable:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_responsable" id="Id_responsable" class="form-control @error('Id_responsable') is-invalid @enderror"
                                name="Id_responsable" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosResponsable as $responsable)

                                    <option value="{{$responsable['Id_responsable']}}">{{$responsable['Nom_responsable']}}</option>
                                    @endforeach
                                </select>
                                @error('Id_responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Id_rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebano:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_rebano" id="Id_rebano" class="form-control @error('Id_rebano') is-invalid @enderror"
                                name="Id_rebano" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosRebano as $rebano)

                                    <option value="{{$rebano['Id_rebano']}}">{{$rebano['Nom_rebano']}}</option>
                                    @endforeach
                                </select>
                                @error('Id_rebano')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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