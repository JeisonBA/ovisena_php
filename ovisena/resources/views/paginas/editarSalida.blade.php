@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar Salida') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($salidas as $salida)

                    <form method="POST" action="{{ url('/')}}/salida/{{$salida['Id_salida']}}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="ovino" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del ovino:') }}</label>

                            <div class="col-md-6">
                                <select name="ovino" id="ovino" class="form-control @error('ovino') is-invalid @enderror"
                                name="ovino" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)

                                    <option value="{{$ovino['Id_ovino']}}" {{ $ovino['Id_ovino'] ==
                                        $ovino['Id_ovino'] ?'selected' : '' }}>
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
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="datetime" class="form-control @error('Fecha') is-invalid @enderror"
                                name="Fecha" value="{{ $salida['Fecha']}}" required autocomplete="Fecha" autofocus>

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
                            value="{{ $salida['Motivo']}}" required autocomplete="Motivo" autofocus>
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
                                name="Descripcion" value="{{ $salida['Descripcion']}}" required autocomplete="Descripcion" autofocus>

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