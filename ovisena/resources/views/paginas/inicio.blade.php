<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <script type="module" src="js/main.js"></script>
</head>
@extends('layouts.app')

@section('content')
<style>
    .caja2:hover {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
</style>
<div>
    <h1 style="margin-top: 85px;text-align:center; background-color: transparent; color: black;">¡Bienvenido a Ovisena.php! </h1>
    <div>
        <img class="caja2" src="img/logooviverde.png" alt="" style="margin-top: -150px; height: 250px; width: 300 px;">
        <img src="img/logooviverde.png" alt="" style="margin-left: 925px; margin-top: -275px; height: 250px; width: 300 px;">
    </div>
    <br> <br>
    <div style="margin-top: -37px;">
        &nbsp;
        <img src="img/ovinoaprendiz.jpeg" alt="" style="height: 270px; width: 290 px; border-radius: 10%">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

        <img src="img/image9.jpg" alt="" style="height: 270px; width: 300 px;  border-radius: 10%">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        
        <img src="img/responsable.jpg" alt="" style="height: 270px; width: 300 px; border-radius: 10%">
    </div>
    <br> <br> <br>
    <div id="">
        <h1>&nbsp; 
            <b>¡Que agradable tenerte con nosotros!</b>
        </h1>
        <br>
        <h3>
            &nbsp;Aquí encontrarás todo lo que necesitas para gestionar y controlar tus inventarios de manera eficiente.
            Explora &nbsp;nuestras herramientas y funciones diseñadas para simplificar tu trabajo y optimizar tus procesos.
            Estamos aquí para &nbsp;ayudarte en cada paso del camino. ¡Comienza a gestionar la unidad de forma sencilla y efectiva con nosotros!.
        </h3>
    </div>
    <br>
    <h3>
        &nbsp;Algunas imagenes sobre la unidad aqui abajo :)
    </h3>
    <br>
    <h2 style="text-align: center;">¡Unidad de Ovinos!</h2>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="margin-left: 100px; margin-right: 100px; height: 490px;">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="img/unidad.jpeg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/ovino.jpg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/pastoreo.jpeg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/image3.jpg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/image9.jpg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/responsable.jpg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/crias.jpeg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/rebano.jpeg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/image5.jpg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
                <img src="img/ovinoaprendiz.jpeg" class="d-block w-100" alt="..." style="height: 490px; border-radius: 10%">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black; border: solid;"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black; border: solid;"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
@endsection