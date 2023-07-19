@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar Alimentaciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($alimentaciones as $alimentacion)

                    <form method="POST" action="{{ url('/')}}/alimentacion/{{$alimentacion['Id_alimentacion']}}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="Fec_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fec_inicio" type="datetime-local" class="form-control @error('Fec_inicio') is-invalid @enderror"
                                name="Fec_inicio" value="{{ $alimentacion['Fec_inicio']}}" required autocomplete="Fec_inicio" autofocus>

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
                                name="Fec_final" value="{{ $alimentacion['Fec_final']}}" required autocomplete="Fec_final" autofocus>

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
                            value="{{ $alimentacion['Tipo']}}" required autocomplete="Tipo" autofocus>
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
                            <label for="Cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad:') }}</label>

                            <div class="col-md-6">
                                <input id="Cantidad" type="text" class="form-control @error('Cantidad') is-invalid @enderror"
                                name="Cantidad" value="{{ $alimentacion['Cantidad']}}" required autocomplete="Cantidad" autofocus>

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
                                name="Reporte" value="{{ $alimentacion['Reporte']}}" required autocomplete="Reporte" autofocus>

                                @error('Reporte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="responsable" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del responsable:') }}</label>

                            <div class="col-md-6">
                                <select name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror"
                                name="responsable" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosResponsable as $responsable)

                                    <option value="{{$responsable['Id_responsable']}}" {{ $responsable['Id_responsable'] ==
                                    $alimentacion['Id_responsable'] ? 'selected' : '' }}>{{$responsable['Nom_responsable']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebaño:') }}</label>

                            <div class="col-md-6">
                                <select name="rebano" id="rebano" class="form-control @error('rebano') is-invalid @enderror"
                                name="rebano" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosRebano as $rebano)

                                    <option value="{{$rebano['Id_rebano']}}" {{ $rebano['Id_rebano'] ==
                                        $alimentacion['Id_rebano'] ?'selected' : '' }}>
                                        {{$rebano['Nom_rebano']}}</option>
                                    @endforeach
                                </select>
                                @error('rebano')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection