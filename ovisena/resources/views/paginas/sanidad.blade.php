@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Sanidad:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoSanidad" v-on:keyup="buscarSanidad">
        </div>
        <div class="col-auto">
            <span v-if="sanidad.length == 0" class="btn btn-success" v-on:click="buscarSanidad">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarSanidad')}}"><button type="button" class="btn btn-success">Agregar Sanidad</button></a></span>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Sanidad') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-secondary">Codigo Sanidad</th>
                            <th class="table-success">Fecha</th>
                            <th class="table-secondary">Tipo</th>
                            <th class="table-success">Medicamento</th>
                            <th class="table-secondary">Descripcion</th>
                            <th class="table-success">Nombre del responsable</th>
                            <th class="table-secondary">Nombre del ovino</th>
                            <th class="table-success">Nombre del rebaño</th>
                            <th class="table-secondary">Accion</th>
                        </thead>
                        <tbody>
                            
                            <tr v-for="sanidad in sanidad">
                                <td class="table-success">  @{{ sanidad.Id_sanidad       }}</td>
                                <td class="table-secondary">@{{ sanidad.Fecha            }}</td>
                                <td class="table-success">  @{{ sanidad.Tipo             }}</td>
                                <td class="table-secondary">@{{ sanidad.Medicamento      }}</td>
                                <td class="table-success">  @{{ sanidad.Descripcion      }}</td>
                                <td class="table-secondary">@{{ sanidad.Nom_responsable  }}</td>
                                <td class="table-success">  @{{ sanidad.Nom_ovino        }}</td>
                                <td class="table-secondary">@{{ sanidad.Nom_rebano       }}</td>
                                <td class="table-success">
                                <a v-bind:href="'http://localhost:8000/sanidad/'+sanidad.Id_sanidad">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button class="btn btn-danger" v-on:click="eliminarSanidad(sanidad.Id_sanidad)"><i class="bi bi-trash3"></i></button>
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