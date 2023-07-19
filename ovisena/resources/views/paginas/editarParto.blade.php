@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar Partos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($partos as $parto)

                    <form method="POST" action="{{ url('/')}}/parto/{{$parto['Id_parto']}}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="Fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="datetime-local" class="form-control @error('Fecha') is-invalid @enderror"
                                name="Fecha" value="{{ $parto['Fecha']}}" required autocomplete="Fecha" autofocus>

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
                            value="{{ $parto['Tipo']}}" required autocomplete="Tipo" autofocus>
                                    <option value="Cordero">Cordero</option>
                                    <option value="Mellizos">Mellizos</option>
                                    <option value="Trillisos">Sal mineralizada</option>
                                </select>
                                @error('Tipo')
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
                                name="Descripcion" value="{{ $parto['Descripcion']}}" required autocomplete="Descripcion" autofocus>

                                @error('Descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Id_madre" class="col-md-4 col-form-label text-md-end">{{ __('Madre:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_madre" id="Id_madre" class="form-control @error('Id_madre') is-invalid @enderror"
                                name="Id_madre" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)
                                    @if($ovino['Sexo'] == 'Hembra')
                                    <option value="{{$ovino['Id_ovino']}}" {{ $ovino['Id_ovino'] ==
                                        $parto['Id_madre'] ? 'selected' : '' }}>
                                        {{$ovino['Nom_ovino']}}
                                    @endif
                                    </option>
                                    @endforeach
                                </select>
                                @error('Id_madre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Id_padre" class="col-md-4 col-form-label text-md-end">{{ __('Padre:') }}</label>

                            <div class="col-md-6">
                                <select name="Id_padre" id="Id_padre" class="form-control @error('Id_padre') is-invalid @enderror"
                                name="Id_padre" required>

                                    <option value="">Selecciona uno...</option>
                                    @foreach ($datosOvino as $ovino)
                                    @if($ovino['Sexo'] == 'Macho')
                                    <option value="{{$ovino['Id_ovino']}}" {{ $ovino['Id_ovino'] ==
                                        $parto['Id_padre'] ?'selected' : '' }}>
                                        {{$ovino['Nom_ovino']}}
                                    @endif
                                    </option>
                                    @endforeach
                                </select>
                                @error('Id_padre')
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