@extends('layouts.app')

@section('content')

@foreach($preguntas as $pregunta)
@foreach($respuestas as $respuesta)

<div class="container">
    <div id="portada">
    <h2>VIDAS: </h2>
    <form id="juego" action="{{('/juego')}}" method="POST">
        @csrf
        {{$pregunta['pregunta']}}
        <br>
        <input type="radio" name="rta" value="{{$respuesta['rta1']}}" data-labelauty=""> <br>
        <input type="radio" name="rta" value="{{$respuesta['rta2']}}" data-labelauty=""><br>
        <input type="radio" name="rta" value="{{$respuesta['rtaC']}}" data-labelauty=""> <br>
        <br>
        <input type="submit" name="enviar" id="btnjuego"> <br>
        <div id="rta">

        </div>
    </form>
@endforeach
@endforeach
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