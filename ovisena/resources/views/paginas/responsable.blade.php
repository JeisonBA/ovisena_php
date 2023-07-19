@if (isset(Auth::user()->name))

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Responsable:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoResponsable" v-on:keyup="buscarResponsable">
        </div>
        <div class="col-auto">
            <span v-if="responsable.length == 0" class="btn btn-success" v-on:click="buscarResponsable">Mirar todos</span>
            &nbsp;
            <a href="{{url('/agregarResponsable')}}"><button type="button" class="btn btn-success">Agregar Responsable</button></a></span>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Responsables') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th class="table-success">Codigo responsable</th>
                            <th class="table-secondary">Nombre</th>
                            <th class="table-success">Documento</th>
                            <th class="table-secondary">Telefono</th>
                            <th class="table-success">Tipo</th>
                            <th class="table-secondary">Ficha</th>
                            <th class="table-success">Acciones</th>
                        </thead>
                        <tbody>
                            
                            <tr v-for="responsable in responsable">
                                <td class="table-success">  @{{ responsable.Id_responsable  }}</td>
                                <td class="table-secondary">@{{ responsable.Nom_responsable }}</td>
                                <td class="table-success">  @{{ responsable.Doc_responsable }}</td>
                                <td class="table-secondary">@{{ responsable.Telefono        }}</td>
                                <td class="table-success">  @{{ responsable.Tipo            }}</td>
                                <td class="table-secondary">@{{ responsable.Ficha           }}</td>
                                <td class="table-success">
                                    <a v-bind:href="'http://localhost:8000/responsable/'+responsable.Id_responsable">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    </a>
                                    <button  class="btn btn-danger" v-on:click="eliminarResponsable(responsable.Id_responsable)"><i class="bi bi-trash3"></i></button>
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