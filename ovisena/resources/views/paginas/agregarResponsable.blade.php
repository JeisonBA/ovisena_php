@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Responsable') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/responsable/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Nom_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Nombres:') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_responsable" type="text" class="form-control @error('Nom_responsable') is-invalid @enderror"
                                name="Nom_responsable" required autocomplete="Nom_responsable" autofocus>

                                @error('Nom_responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Doc_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Documento:') }}</label>

                            <div class="col-md-6">
                                <input id="Doc_responsable" type="text" class="form-control @error('Doc_responsable') is-invalid @enderror"
                                name="Doc_responsable" required autocomplete="Doc_responsable" autofocus>

                                @error('Doc_responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono:') }}</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror"
                                name="Telefono" required autocomplete="Telefono" autofocus>

                                @error('Telefono')
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
                                value="" required autocomplete="Tipo" autofocus v-model="TipoRes">
                                    <option value="">Selecciona uno...</option>
                                    <option value="Instructor">Instructor</option>
                                    <option value="Pasante">Pasante</option>
                                    <option value="Gestor">Gestor</option>
                                </select>
                                
                                @error('Tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" v-if="TipoRes == 'Pasante' || TipoRes == 'Gestor'">
                            <label for="Ficha" class="col-md-4 col-form-label text-md-end">{{ __('Ficha:') }}</label>
                            
                            <div class="col-md-6">
                                <input id="Ficha" type="text" class="form-control @error('Ficha') is-invalid @enderror" name="Ficha"
                                value="">

                                @error('Ficha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" v-else></div>

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