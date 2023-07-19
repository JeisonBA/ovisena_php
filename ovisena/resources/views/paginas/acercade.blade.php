<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acerca de</title>
    <script type="module" src="js/main.js"></script>
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-md-12" style="text-align: center;">
                    <h3>{{ __('Acerca de') }}</h3>
                </div>
                <div class="card-body">
                    <h5><b>
                            La unidad de ovinos comenzó en 2005 con un grupo de ovejas criollas proporcionadas por CORPOICA,
                            ahora llamada "AGROSABIA". Estas ovejas se utilizaron en un programa de investigación para estudiar su
                            comportamiento en un cultivo de mango, ya que se alimentan de la maleza y el pasto que crece debajo de los
                            árboles sin dañarlos. Después de finalizar el proyecto, quedaron algunas ovejas sin cuidado, por lo que
                            el Doctor Antonio Lozano, jefe en ese entonces, decidió hacerse cargo de ellas. Las ovejas criollas eran
                            comunes y se encontraban en varias regiones de Colombia como Coyaima, Natagaima, Ortega y Saldaña.
                            Eran ovejas criollas de diferentes colores, conocidas como Camuros, que son el resultado de las ovejas
                            traídas por los españoles durante la conquista. Estas ovejas no tenían ningún tipo de selección genética.
                            Las ovejas fueron recibidas por el SENA y se construyó un pequeño refugio para ellas en un jardín enmalezado.
                            Con el tiempo, se construyó una nueva instalación, realizada por los aprendices del Técnico en Soldadura con
                            materiales de formación y la ayuda de un contratista en 2005.
                            <br><br>
                            En 2006, se importó una raza específica, el "PELIBUEY", que es originaria de África y se caracteriza por
                            ser homogénea en cuanto a su color, sin presentar manchas. A partir de ese momento, se comenzó a trabajar
                            solo con la raza "PELIBUEY". Se importaron 2 machos y 3 hembras de México y se cruzaron con las ovejas
                            criollas, conservando la pureza de la raza hasta obtener lo que se conoce actualmente como
                            "Animales de Alta Selección PELIBUEY".
                            <br><br>
                            En 2011, se llevó a cabo una exposición en Bogotá llamada AgroEspo, que se celebra cada dos años y reúne
                            a la comunidad agropecuaria. Se llevaron animales de la unidad de ovinos y obtuvieron varios premios,
                            incluido el premio a la mejor oveja de la exposición. Esta experiencia demostró que se habían convertido
                            en los principales proveedores del país en la raza "PELIBUEY" y desde entonces, la unidad ha sido reconocida
                            por su genética. Siempre se les contacta si alguien necesita un macho puro de buena calidad para iniciar su
                            negocio de ovinos. Sin embargo, la atención y cuidado de los animales son responsabilidad de los gestores y
                            aprendices del Centro Agropecuario.
                            <b>
                    </h5>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection