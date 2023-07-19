@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Rebaño:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoRebano" v-on:keyup="buscarRebano">
        </div>
        <div class="col-auto">
            <span v-if="rebano.length == 0" class="btn btn-success" v-on:click="buscarRebano">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarRebano')}}"><button type="button" class="btn btn-success">Agregar Rebaño</button></a></span>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Rebaños') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Codigo rebaño</th>
                            <th class="table-secondary">Nombre del rebaño</th>
                            <th class="table-success">Fecha</th>
                            <th class="table-secondary">Cant. Ovinos</th>
                            <th class="table-success">Accion</th>
                        </thead>
                        <tbody>

                            <tr v-for="rebano in rebano">
                                <td class="table-success">  @{{ rebano.Id_rebano   }}</td>
                                <td class="table-secondary">@{{ rebano.Nom_rebano  }}</td>
                                <td class="table-success">  @{{ rebano.Fecha       }}</td>
                                <td class="table-secondary">@{{ rebano.Cant_ovinos }}</td>
                                <td class="table-success">
                                    <a v-bind:href="'http://localhost:8000/rebano/'+rebano.Id_rebano">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button class="btn btn-danger" v-on:click="eliminarRebano(rebano.Id_rebano)"><i class="bi bi-trash3"></i></button>
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