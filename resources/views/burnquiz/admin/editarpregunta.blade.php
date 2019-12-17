@extends('layouts.app')

@section('content')

<div class="container py-5 my-5">
    <form class="w-100" action="/preguntas/modificar" method="POST">
    @csrf
        <h3>Editá la pregunta.</h3>
        <br>
        <input type="hidden" name="id" value="{{$preguntas->id}}">
        <textarea name="pregunta" value="{{$preguntas->pregunta}}">{{$preguntas->pregunta}}</textarea>
        <br>
        <br>
        <label for="respuesta1">Respuesta 1:</label>
        <br>
        <input type="text" name="rta1" value="{{$rtas[0]->respuesta}}">
        <br>
        <label for="respuesta2">Respuesta 2:</label>
        <br>
        <input type="text" name="rta2" value="{{$rtas[1]->respuesta}}">
        <br>
        <label for="respuesta3">Respuesta Correcta:</label>
        <br>
        <input type="text" name="rtaC" value="{{$rtas[2]->respuesta}}">
        <br>
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>

@endsection