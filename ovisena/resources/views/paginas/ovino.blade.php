@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<style>
    .warning-button {
        background-color: #ffcc00;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: not-allowed;
    }

    .warning-button:hover {
        background-color: #e6b800;
    }
</style>
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Ovino:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoOvino" v-on:keyup="buscarOvino">
        </div>
        <div class="col-auto">
            <span v-if="ovino.length == 0" class="btn btn-success" v-on:click="buscarOvino">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarOvino')}}"><button type="button" class="btn btn-success">Agregar Ovino</button></a>
        </div>

    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Ovinos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table" class="table-danger">
                        <thead>
                            <th class="table-success"> Codigo Ovino </th>
                            <th class="table-secondary">Numero consecutivo </th>
                            <th class="table-success"> Nombre </th>
                            <th class="table-secondary">Fecha de nacimiento </th>
                            <th class="table-success"> Raza </th>
                            <th class="table-secondary">Sexo </th>
                            <th class="table-success"> Categoria </th>
                            <th class="table-secondary">Motivo </th>
                            <!-- <th class="table-success"> Peso de nacimiento </th> -->
                            <th class="table-success">Peso actual(Kilos)</th>
                            <!-- <th class="table-success"> Ganancia de peso </th> -->
                            <th class="table-secondary">Nombre del responsable</th>
                            <th class="table-success"> Nombre del rebaño </th>
                            <th class="table-secondary">Acciones </th>
                        </thead>
                        <tbody>

                            <tr v-for="ovino in ovino">
                                <td class="table-secondary"> @{{ ovino.Id_ovino         }}</td>
                                <td class="table-success">   @{{ ovino.Num_consecutivo  }}</td>
                                <td class="table-secondary"> @{{ ovino.Nom_ovino        }}</td>
                                <td class="table-success">   @{{ ovino.Fec_nacimiento   }}</td>
                                <td class="table-secondary"> @{{ ovino.Raza             }}</td>
                                <td class="table-success">   @{{ ovino.Sexo             }}</td>
                                <td class="table-secondary"> @{{ ovino.Categoria        }}</td>
                                <td class="table-success">   @{{ ovino.Motivo           }}</td>
                                <!-- <td class="table-secondary"> @{{ ovino.Peso_nacimiento  }}</td> -->
                                <td class="table-secondary"> @{{ ovino.Peso_actual    }}</td>
                                <!-- <td class="table-secondary"> @{{ ovino.Gdp              }}</td> -->
                                <td class="table-success">   @{{ ovino.Nom_responsable  }}</td>
                                <td class="table-secondary"> @{{ ovino.Nom_rebano       }}</td>
                                <td class="table-success">
                                    <a v-bind:href="'http://localhost:8000/ovino/'+ovino.Id_ovino">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button v-if="ovino.borrar == 'si'" class="btn btn-danger" v-on:click="eliminarOvino(ovino.Id_ovino)"><i class="bi bi-trash3"></i></button>
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