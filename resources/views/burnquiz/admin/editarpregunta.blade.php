@extends('layouts.app')

@section('content')

<div class="container py-5 my-5">
    <form class="w-100" action="/preguntas/modificar" method="POST">
    @csrf
        <h3>Editá la pregunta.</h3>
        <br>
        <input type="hidden" name="id" value="{{$pregunta->id}}">
        <textarea name="pregunta" value="{{$pregunta->pregunta}}">{{$pregunta->pregunta}}</textarea>
        <br>
        <br>
        @foreach($pregunta->respuestas as $key => $respuesta)
        <label for="respuesta1">Respuesta {{$key + 1}}</label>
        <br>
        <input type="hidden" name="rta[{{$key}}][id]" value="{{$respuesta->id}}">
        <input type="text" name="rta[{{$key}}][respuesta]" value="{{$respuesta->respuesta}}">
        <input type="hidden" name="rta[{{$key}}][esCorrecta]" value="@if($respuesta->validacion=='c') 1 @else 0 @endif">
        <br>
        @endforeach
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>

@endsection