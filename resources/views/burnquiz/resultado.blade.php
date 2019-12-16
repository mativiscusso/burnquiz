@extends('layouts.app')

@section('content')
<div id="portada" class="container py-5">
            <h1><?= "EL JUEGO HA TERMINADO"?></h1>
            <h2>USUARIO:</h2>
            <h2>SU PUNTAJE ES: </h2><br>
            <input type="checkbox" id="cb1" /><label id="cb2" for="cb1"><a id="start" href="/juego">Juego Nuevo</a></label>
</div>

@endsection