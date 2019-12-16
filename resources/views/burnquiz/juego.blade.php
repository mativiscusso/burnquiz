@extends('layouts.app')

@section('content')

<div class="container">
    <div id="portada">
    <h2>PUNTAJE: @isset($puntaje)
                    {{$puntaje}}
                 @endisset</h2>

    <form id="juego" action="/juego/next" method="POST">
    @csrf
        {{$pregunta->pregunta}}
        <br>
        <input type="hidden" name="pregunta_id" value="{{$pregunta->id}}">
        @foreach($respuestas as $respuesta)
        <div style="padding-left: 45%">
        <div class="text-left">
        <input name="rta" type="radio" value="{{$respuesta->respuesta}}"/>
        <span class="text-dark">{{$respuesta->respuesta}}</span><br>
        </div>
        </div>
       @endforeach
        <br>
        <br>
        <input type="submit" name="enviar" id="btnjuego"> <br>
        <div id="rta">

        </div>
    </form>

</div>

@endsection