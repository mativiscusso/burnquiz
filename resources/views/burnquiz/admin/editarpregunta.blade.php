@extends('layouts.app')

@section('content')

<div class="container">
    <form class="w-100" action="/preguntas/agregar" method="POST">
    @csrf
        <h3>Editá la pregunta.</h3>
        <br>
        <textarea name="pregunta">{{$preguntas->pregunta}}</textarea>
        <br>
        <label>Y ahora las posibles respuestas.</label>
        <br>
        <label for="respuesta1">Respuesta 1:</label>
        <br>
        @if($preguntas->id = $respuestas->id_pregunta)
        @for($i = 0; $i < 2; $i++)
        <input type="text" name="rta1" value="{{$respuestas->respuesta}}">
        <br>
        <label for="respuesta2">Respuesta 2:</label>
        <br>
        <input type="text" name="rta2" value="{{$respuestas->respuesta}}">
        <br>
        <label for="respuesta3">Respuesta Correcta:</label>
        <br>
        <input type="text" name="rtaC" value="{{$respuestas->respuesta}}">
        @endfor
        @endif
        <br>
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>

@endsection