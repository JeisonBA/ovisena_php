<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quienes somos</title>
  <script type="module" src="js/main.js"></script>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header col-md-12" style="text-align: center;">
          <h3>{{ __('¡Quienes somos!') }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="card-group" style="margin-left: 45px; margin-right: 45px;">
  <div class="card">
    <img src="img/fotojeison.jpg" class="card-img-top" alt="..." height="470">
    <div class="card-body">
      <h5 class="card-title">𒊹 Jeison Arley Bastidas Avila</h5>
      <p class="card-text"><b>✔ Analista y desarrollador</b></p>
      <p class="card-text"><b>📬 Jeisonbastidas213@gmail.com</b></p>
      <p class="card-text"><b>🏠 Purificacion/Tolima</b></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 3 minutos</small>
    </div>
  </div>
  <div class="card">
    <img src="img/fotomary.jpg" class="card-img-top" alt="..." height="470">
    <div class="card-body">
      <h5 class="card-title">𒊹 Mary Julieth Gomez Hernandez</h5>
      <p class="card-text"><b>✔ Analista y desarrollador</b></p>
      <p class="card-text"><b>📬 Marygomezh2000@gmail.com</b></p>
      <p class="card-text"><b>🏠 Dolores/Tolima</b></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 3 minutos</small>
    </div>
  </div>
  <div class="card">
    <img src="img/fotonatalia.jpg" class="card-img-top" alt="..." height="470">
    <div class="card-body">
      <h5 class="card-title">𒊹 Ingrid Natalia Ramirez Cardoso</h5>
      <p class="card-text"><b>✔ Analista y desarrollador</b></p>
      <p class="card-text"><b>📬 natiscardoso78@gmail.com</b></p>
      <p class="card-text"><b>🏠 Espinal/Tolima</b></p>

    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 3 minutos</small>
    </div>
  </div>
</div>

@endsection