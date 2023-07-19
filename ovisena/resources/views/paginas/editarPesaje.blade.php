@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar Pesaje') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($pesajes as $pesaje)

                    <form method="POST" action="{{ url('/')}}/pesaje/{{$pesaje['Id_pesaje']}}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="datetime" class="form-control @error('Fecha') is-invalid @enderror" name="Fecha"
                                value="{{ $pesaje['Fecha']}}" required autocomplete="Fecha" autofocus>

                                @error('Fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="ovino" id="ovino" class="form-control @error('ovino') is-invalid @enderror"
                                name="ovino" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)

                                    <option value="{{$ovino['Id_ovino']}}" {{ $ovino['Id_ovino'] ==
                                        $pesaje['Id_ovino'] ?'selected' : '' }}>
                                        {{$ovino['Nom_ovino']}}</option>
                                    @endforeach
                                </select>
                                @error('ovino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Peso_actual" class="col-md-4 col-form-label text-md-end">{{ __('Peso actual:') }}</label>

                            <div class="col-md-6">
                                <input id="Peso_actual" type="number" class="form-control @error('Peso_actual') is-invalid @enderror"
                                name="Peso_actual" value="{{ $pesaje['Peso_actual']}}" ref="peso_actu" readonly>

                                @error('Peso_actual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Peso_final" class="col-md-4 col-form-label text-md-end">{{ __('Peso final:') }}</label>

                            <div class="col-md-6">
                                <input id="Peso_final" type="number" step="0.0" class="form-control @error('Peso_final') is-invalid @enderror"
                                name="Peso_final" value="{{ $pesaje['Peso_final']}}" ref="peso_fin" @change="calcular_gananciaP_editar" autofocus>

                                @error('Peso_final')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Gdp" class="col-md-4 col-form-label text-md-end">{{ __('Ganancia de peso:') }}</label>

                            <div class="col-md-6">
                                <input id="Gdp" type="number" class="form-control @error('Gdp') is-invalid @enderror" name="Gdp"
                                value="{{ $pesaje['Gdp']}}" required autocomplete="Gdp" ref="gananciaP" readonly>

                                @error('Gdp')
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
                                    $ovino['Id_responsable'] ? 'selected' : '' }}>{{$responsable['Nom_responsable']}}
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