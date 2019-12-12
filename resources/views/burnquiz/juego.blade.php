@extends('layouts.app')

@section('content')
<div class="container">
    <div id="portada">
    <h2>VIDAS: </h2>
    <form id="juego" action="/juego/next" method="POST">
    @csrf
        {{$pregunta->pregunta}}
        <br>
        <input type="hidden" value="{{$pregunta->id}}">
        @foreach($respuestas as $respuesta)
        <input type="radio" name="rta" value="{{$respuesta->respuesta}}" data-labelauty="{{$respuesta->respuesta}}">{{$respuesta->respuesta}}
        <br>
        @endforeach
        <br>
        <br>
        <input type="submit" name="enviar" id="btnjuego"> <br>
        <div id="rta">

        </div>
    </form>
    <div id="progresbar" class="progress">
        <div class="progress-bar bg-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100">
            <span class="sr-only"></span>
        </div>
    </div>
    </div>

</div>
<script>
			$(document).ready(function(){
				$(":checkbox").labelauty();
				$(":radio").labelauty();
			});
</script>

@endsection