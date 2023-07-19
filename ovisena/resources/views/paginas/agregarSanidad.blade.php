@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">{{ __('Agregar Sanidad') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/sanidad/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>

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
                            <label for="Tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo:') }}</label>

                            <div class="col-md-6">
                                <select id="Tipo" class="form-control @error('Tipo') is-invalid @enderror" name="Tipo"
                                value="" required autocomplete="Tipo" autofocus v-model="TipoSani">
                                    <option value="">Seleccione uno...</option>
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

                        <div class="row mb-3" v-if="TipoSani == 'Enfermedad' || TipoSani == 'Famacha' || TipoSani == 'Vacuna'">
                            <label for="Medicamento" class="col-md-4 col-form-label text-md-end">{{ __('Medicamento:') }}</label>

                            <div class="col-md-6">
                                <input id="Medicamento" type="text" class="form-control @error('Medicamento') is-invalid @enderror"
                                name="Medicamento" value="" required autocomplete="Medicamento" autofocus>

                                @error('Medicamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="" v-else></div>
                        
                        <div class="row mb-3">
                            <label for="Descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion:') }}</label>

                            <div class="col-md-6">
                                <input id="Descripcion" type="text" class="form-control @error('Descripcion') is-invalid @enderror"
                                name="Descripcion" value="" required autocomplete="Descripcion" autofocus>

                                @error('Descripcion')
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
                            <label for="Id_ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_ovino" id="Id_ovino" class="form-control @error('Id_ovino') is-invalid @enderror"
                                name="Id_ovino">

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
                            <label for="Id_rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebaño:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_rebano" id="Id_rebano" class="form-control @error('Id_rebano') is-invalid @enderror"
                                name="Id_rebano">

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