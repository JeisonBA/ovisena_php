@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Alimentacion:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoAlimentacion" v-on:keyup="buscarAlimentacion">
        </div>
        <div class="col-auto">
            <span v-if="alimentacion.length == 0" class="btn btn-success" v-on:click="buscarAlimentacion">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarAlimentacion')}}"><button type="button" class="btn btn-success">Agregar Alimentacion</button></a></span>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Alimentaciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Codigo de Alimentacion</th>
                            <th class="table-secondary">Fecha</th>
                            <th class="table-success">Tipo</th>
                            <th class="table-secondary">Cantidad(Kilos)</th>
                            <th class="table-success">Reporte</th>
                            <th class="table-secondary">Nombre del rebaño</th>
                            <th class="table-success">Nombre del responsable</th>
                            <th class="table-secondary">Accion</th>
                            <!-- <th class="table-success"></th> -->
                        </thead>
                        <tbody>

                            <tr v-for="alimentacion in alimentacion">
                                <td class="table-success">  @{{ alimentacion.Id_alimentacion  }}</td>
                                <td class="table-secondary">@{{ alimentacion.Fec_inicio       }}</td>
                                <td class="table-success">  @{{ alimentacion.Tipo             }}</td>
                                <td class="table-secondary">@{{ alimentacion.Cantidad         }}</td>
                                <td class="table-success">  @{{ alimentacion.Reporte          }}</td>
                                <td class="table-secondary">@{{ alimentacion.Nom_rebano       }}</td>
                                <td class="table-success">  @{{ alimentacion.Nom_responsable  }}</td>
                                <!-- <td class="table-secondary">@{{ alimentacion.   }}</td> -->
                                <td class="table-secondary">
                                    <a v-bind:href="'http://localhost:8000/alimentacion/'+alimentacion.Id_alimentacion">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button v-if="alimentacion.borrar == 'si'" class="btn btn-danger" v-on:click="eliminarAlimentacion(alimentacion.Id_alimentacion)"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                            <span v-on:click="alerta" style="float: right;">
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