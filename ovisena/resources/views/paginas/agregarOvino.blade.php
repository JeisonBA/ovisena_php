@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Agregar Ovino') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/ovino/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Num_consecutivo" class="col-md-4 col-form-label text-md-end">{{ __('Numero consecutivo:') }}</label>

                            <div class="col-md-6">
                                <input id="Num_consecutivo" type="text" class="form-control @error('Num_consecutivo') is-invalid @enderror"
                                name="Num_consecutivo" value="" required autocomplete="Num_consecutivo" autofocus>

                                @error('Num_consecutivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="Nom_ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_ovino" type="text" class="form-control @error('Nom_ovino') is-invalid @enderror"
                                name="Nom_ovino" value="" required autocomplete="Nom_ovino" autofocus>

                                @error('Nom_ovino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Fec_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento:') }}</label>

                            <div class="col-md-6">
                                <input id="Fec_nacimiento" type="datetime-local" class="form-control @error('Fec_nacimiento') is-invalid @enderror"
                                name="Fec_nacimiento" value="" required autocomplete="Fec_nacimiento" autofocus>

                                @error('Fec_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Raza" class="col-md-4 col-form-label text-md-end">{{ __('Raza:') }}</label>

                            <div class="col-md-6">
                                <select id="Raza" class="form-control @error('Raza') is-invalid @enderror" name="Raza" value=""
                                required autocomplete="Raza" autofocus>
                                    <option value="Pelibuey">Pelibuey</option>
                                </select>

                                @error('Raza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo:') }}</label>

                            <div class="col-md-6">
                                <select id="Sexo" class="form-control @error('Sexo') is-invalid @enderror" name="Sexo" value=""
                                required autocomplete="Sexo" autofocus>
                                    <option value="">Selecciona uno...</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>

                                @error('Sexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoria:') }}</label>

                            <div class="col-md-6">
                                <select id="Categoria" class="form-control @error('Categoria') is-invalid @enderror" name="Categoria" value=""
                                required autocomplete="Categoria" autofocus>
                                    <option value="">Selecciona uno...</option>
                                    <option value="Cordero">Cordero</option>
                                    <option value="Levante">Levante</option>
                                    <option value="Borrego">Borrego</option>
                                    <option value="Reproductor">Reproductor</option>
                                    <option value="Oveja">Oveja</option>
                                </select>

                                @error('Categoria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Motivo" class="col-md-4 col-form-label text-md-end">{{ __('Motivo:') }}</label>

                            <div class="col-md-6">
                                <select id="Motivo" class="form-control @error('Motivo') is-invalid @enderror" name="Motivo"
                                value="" required autocomplete="Motivo" autofocus> <!-- v-model="MotivoOvi" -->
                                    <option value="">Selecciona uno...</option>
                                    <option value="Nacimiento">Nacimiento</option>
                                    <option value="Compra">Compra</option>
                                </select>
                                @error('Motivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                        v-if="MotivoOvi == 'Nacimiento'"
                            <label for="Peso_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Peso nacimiento(Kilos):') }}</label>

                            <div class="col-md-6">
                                <input id="Peso_nacimiento" type="int" class="form-control @error('Peso_nacimiento') is-invalid @enderror"
                                name="Peso_nacimiento" value="" required autocomplete="Peso_nacimiento" autofocus>

                                @error('Peso_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div v-else></div> -->

                        <div class="row mb-3">
                            <label for="Peso_actual" class="col-md-4 col-form-label text-md-end">{{ __('Peso actual(Kilos):') }}</label>

                            <div class="col-md-6">
                                <input id="Peso_actual" type="number" class="form-control @error('Peso_actual') is-invalid @enderror"
                                name="Peso_actual" value="" required autocomplete="Peso_actual" autofocus>

                                @error('Peso_actual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="Gdp" class="col-md-4 col-form-label text-md-end">{{ __('Ganancia de peso:') }}</label>

                            <div class="col-md-6">
                                <input id="Gdp" type="float" class="form-control @error('Gdp') is-invalid @enderror" name="Gdp"
                                value="" required autocomplete="Gdp" autofocus>

                                @error('Gdp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

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
                            <label for="Id_rebano" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del rebaño:') }}</label>

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