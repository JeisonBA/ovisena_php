@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Salida:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoSalida" v-on:keyup="buscarSalida">
        </div>
        <div class="col-auto">
            <span v-if="salida.length == 0" class="btn btn-success" v-on:click="buscarSalida">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarSalida')}}"><button type="button" class="btn btn-success">Agregar Salida</button></a></span>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Salidas') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Codigo Salida</th>
                            <th class="table-secondary">Nombre del Ovino</th>
                            <th class="table-success">Fecha</th>
                            <th class="table-secondary">Motivo</th>
                            <th class="table-success">Descripcion</th>
                            <th class="table-secondary">Accion</th>
                        </thead>
                        <tbody>

                            <tr v-for="salida in salida">
                                <td class="table-secondary">@{{ salida.Id_salida        }}</td>
                                <td class="table-success">  @{{ salida.Nom_ovino        }}</td>
                                <td class="table-secondary">@{{ salida.Fecha            }}</td>
                                <td class="table-success">  @{{ salida.salidaMotivo     }}</td>
                                <td class="table-secondary">@{{ salida.Descripcion      }}</td>
                                <td class="table-success">
                                    <a v-bind:href="'http://localhost:8000/salida/'+salida.Id_salida">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button v-if="salida.borrar == 'si'" class="btn btn-danger" v-on:click="eliminarSalida(salida.Id_salida)"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                            <span class="btn-secondary" v-on:click="alerta" style="float: right;">
                                <h5><i class="bi bi-info-circle"></i></h5>
                            </span>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endif