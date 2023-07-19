@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">{{ __('Editar Sanidad') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($sanidas as $sanidad)

                    <form method="POST" action="{{ url('/')}}/sanidad/{{$sanidad['Id_sanidad']}}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>
                            <div class="col-md-6">
                                <input id="Fecha" type="datetime" class="form-control @error('Fecha') is-invalid @enderror"
                                name="Fecha" value="{{ $sanidad['Fecha']}}" required autocomplete="Fecha" autofocus>

                                @error('Fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo:') }}</label>
                            
                            <div class="col-md-6">
                                <select id="Tipo" class="form-control @error('Tipo') is-invalid @enderror" name="Tipo"
                                value="{{ $sanidad['Tipo']}}" required autocomplete="Tipo" autofocus>
                                    <option value="Enfermedad">Enfermedad</option>
                                    <option value="Famacha">Famacha</option>
                                    <option value="Vacuna">Vacuna</option>
                                    <option value="Accidente">Accidente</option>
                                </select>

                                @error('Tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @if($sanidad['Tipo'] == 'Enfermedad' || $sanidad['Tipo'] == 'Famacha' || $sanidad['Tipo'] == 'Vacuna')
                        <div class="row mb-3">
                            <label for="Medicamento" class="col-md-4 col-form-label text-md-end">{{ __('Medicamento:') }}</label>

                            <div class="col-md-6">
                                <input id="Medicamento" type="text" class="form-control @error('Medicamento') is-invalid @enderror"
                                name="Medicamento" value="{{ $sanidad['Medicamento']}}" autofocus>

                                @error('Medicamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @else
                        <div class="" v-else></div>
                        @endif

                        <div class="row mb-3">
                            <label for="Descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion:') }}</label>

                            <div class="col-md-6">
                                <input id="Descripcion" type="text" class="form-control @error('Descripcion') is-invalid @enderror"
                                name="Descripcion" value="{{ $sanidad['Descripcion']}}" required autocomplete="Descripcion" autofocus>

                                @error('Descripcion')
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
                                    $sanidad['Id_responsable'] ? 'selected' : '' }}>{{$responsable['Nom_responsable']}}
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
                            <label for="ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="ovino" id="ovino" class="form-control @error('ovino') is-invalid @enderror"
                                name="ovino" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)

                                    <option value="{{$ovino['Id_ovino']}}" {{ $ovino['Id_ovino'] ==
                                        $sanidad['Id_ovino'] ?'selected' : '' }}>
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
                            <label for="rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebaño:') }}</label>

                            <div class="col-md-6">
                                <select name="rebano" id="rebano" class="form-control @error('rebano') is-invalid @enderror"
                                name="rebano" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosRebano as $rebano)

                                    <option value="{{$rebano['Id_rebano']}}" {{ $rebano['Id_rebano'] ==
                                        $sanidad['Id_rebano'] ?'selected' : '' }}>
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