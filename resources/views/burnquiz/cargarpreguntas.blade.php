@extends('layouts.app')

@section('content')

<div class="container py-5">
    <form class="w-100" action="/preguntas/agregar" method="POST">
    @csrf
        <h3>Sumá tu pregunta.</h3>
        <br>
        <textarea name="pregunta"></textarea>
        <br>
        <label>Y ahora las posibles respuestas.</label>
        <br>
        <label for="respuesta1">Respuesta 1:</label>
        <br>
        <input type="text" name="rta1" value="">
        <br>
        <label for="respuesta2">Respuesta 2:</label>
        <br>
        <input type="text" name="rta2" value="">
        <br>
        <label for="respuesta3">Respuesta Correcta:</label>
        <br>
        <input type="text" name="rtaC" value="">
        <br>
        <br>

        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>

@endsection