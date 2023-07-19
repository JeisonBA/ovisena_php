@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Pesaje:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoPesaje" v-on:keyup="buscarPesaje">
        </div>
        <div class="col-auto">
            <span v-if="pesaje.length == 0" class="btn btn-success" v-on:click="buscarPesaje">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarPesaje')}}"><button type="button" class="btn btn-success">Agregar Pesaje</button></a></span>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Pesajes') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Codigo Pesaje</th>
                            <th class="table-secondary">Fecha</th>
                            <th class="table-success">Nombre del Ovino</th>
                            <th class="table-secondary">Peso actual(Kilos)</th>
                            <th class="table-success">Peso final(Kilos)</th>
                            <th class="table-secondary">Ganancia de peso(Kilos)</th>
                            <th class="table-success">Nombre del responsable</th>
                            <th class="table-secondary">Accion</th>
                        </thead>
                        <tbody>

                            <tr v-for="pesaje in pesaje">
                                <td class="table-secondary">@{{ pesaje.Id_pesaje        }}</td>
                                <td class="table-success">  @{{ pesaje.Fecha            }}</td>
                                <td class="table-secondary">@{{ pesaje.Nom_ovino        }}</td>
                                <td class="table-success">  @{{ pesaje.Peso_actual      }}</td>
                                <td class="table-secondary">@{{ pesaje.Peso_final       }}</td>
                                <td class="table-success">  @{{ pesaje.Gdp              }}</td>
                                <td class="table-secondary">@{{ pesaje.Nom_responsable  }}</td>
                                <td class="table-success">
                                <a v-bind:href="'http://localhost:8000/pesaje/'+pesaje.Id_pesaje">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button v-if="pesaje.borrar == 'si'" class="btn btn-danger" v-on:click="eliminarPesaje(pesaje.Id_pesaje)"><i class="bi bi-trash3"></i></button>
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