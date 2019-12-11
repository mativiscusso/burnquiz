@extends('layouts.app')

@section('content')

    <form action="{{ route('cargarpregunta') }}" method="POST">
    @csrf
        <p>Sumá tu pregunta.</p>
        <br>
        <textarea name="pregunta" cols="10" rows="5"></textarea>
        <br>
        <label>Y ahora las posibles respuestas.</label>
        <br>
        <label for="respuesta1">Respuesta 1:</label>
        <br>
        <input type="text" name="rta1">
        <br>
        <label for="respuesta2">Respuesta 2:</label>
        <br>
        <input type="text" name="rta2">
        <br>
        <label for="respuesta3">Respuesta Correcta:</label>
        <br>
        <input type="text" name="rtaC">
        <br>
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>

@endsection