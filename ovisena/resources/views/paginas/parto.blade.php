@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Parto:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoParto" v-on:keyup="buscarParto">
        </div>
        <div class="col-auto">
            <span v-if="parto.length == 0" class="btn btn-success" v-on:click="buscarParto">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarParto')}}"><button type="button" class="btn btn-success">Agregar Parto</button></a></span>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Partos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Numero de Parto</th>
                            <th class="table-secondary">Fecha</th>
                            <th class="table-success">Tipo</th>
                            <th class="table-secondary">Descripcion</th>
                            <th class="table-success">Madre</th>
                            <th class="table-secondary">Padre</th>
                            <th class="table-success">Accion</th>
                        </thead>
                        <tbody>
                            
                            <tr v-for="parto in parto">
                                <td class="table-success">  @{{ parto.Id_parto    }}</td>
                                <td class="table-secondary">@{{ parto.Fecha       }}</td>
                                <td class="table-success">  @{{ parto.Tipo        }}</td>
                                <td class="table-secondary">@{{ parto.Descripcion }}</td>
                                <td class="table-success">  @{{ parto.Nombre_madre   }}</td>
                                <td class="table-secondary">@{{ parto.Nombre_padre   }}</td>
                                <td class="table-success">
                                <a v-bind:href="'http://localhost:8000/parto/'+parto.Id_parto">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button v-if="parto.borrar == 'si'" class="btn btn-danger" v-on:click="eliminarParto(parto.Id_parto)"><i class="bi bi-trash3"></i></button>
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