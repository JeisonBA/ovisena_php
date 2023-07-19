@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Agregar Salida') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/')}}/salida/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Id_ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_ovino" id="Id_ovino" class="form-control @error('Id_ovino') is-invalid @enderror"
                                name="Id_ovino" required>

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
                            <label for="Motivo" class="col-md-4 col-form-label text-md-end">{{ __('Motivo:') }}</label>

                            <div class="col-md-6">
                            <select id="Motivo" class="form-control @error('Motivo') is-invalid @enderror" name="Motivo"
                            value="" required autocomplete="Motivo" autofocus>
                                    <option value="">Selecciona uno...</option>
                                    <option value="Muerte">Muerte</option>
                                    <option value="Descarte">Descarte</option>
                                    <option value="Venta">Venta</option>
                                </select>
                                @error('Motivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
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