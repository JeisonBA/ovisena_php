@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Agregar Pesaje') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/pesaje/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="datetime-local" class="form-control @error('Fecha') is-invalid @enderror" name="Fecha"
                                value="" required autocomplete="Fecha" autofocus>

                                @error('Fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Id_ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_ovino" id="Id_ovino" class="form-control @error('Id_ovino') is-invalid @enderror"
                                name="Id_ovino" v-on:click="llenarOvinos" v-on:change="cargarPesoActu(Id_ovino)" v-model="Id_ovino" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)

                                    <option value="{{$ovino['Id_ovino']}}">{{$ovino['Nom_ovino']}}</option>
                                    @endforeach
                                </select>
                                @error('Id_ovino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Peso_actual" class="col-md-4 col-form-label text-md-end">{{ __('Peso actual:') }}</label>

                            <div class="col-md-6">
                                <input v-model="peso_actu" type="number" id="Peso_actual" class="form-control @error('Peso_actual') is-invalid @enderror"
                                name="Peso_actual" @keyup="calcular_gananciaP" readonly>

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
                                <input id="Peso_final" type="number" class="form-control @error('Peso_final') is-invalid @enderror"
                                name="Peso_final" required autocomplete="Peso_final" v-model="peso_fin" @keyup="calcular_gananciaP" autofocus>

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
                                <input id="Gdp" class="form-control @error('Gdp') is-invalid @enderror" name="Gdp"
                                v-model="gananciaP" readonly>

                                @error('Gdp')
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